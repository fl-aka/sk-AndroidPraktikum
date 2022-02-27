import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:wisata/widget/destinasi_detail.dart';

// ignore: camel_case_types
class destinasikategori extends StatelessWidget {
  final Map kategori;
  const destinasikategori({Key? key, required this.kategori}) : super(key: key);

  Future<List> getDestinasikategori() async {
    final id = kategori['id'];
    var response = await Dio().get('http://wisata.test/api/kategori/$id');
    return response.data['data'];
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(kategori['nama']),
        backgroundColor: Colors.redAccent,
      ),
      body: FutureBuilder<List>(
        future: getDestinasikategori(),
        builder: (context, snapshot) {
          if (snapshot.hasData) {
            return ListView.builder(
              itemCount: snapshot.data!.length,
              itemBuilder: (context, index) {
                return Container(
                  padding: const EdgeInsets.all(8.0),
                  child: Card(
                    child: InkWell(
                      onTap: () {
                        Navigator.of(context).push(
                          MaterialPageRoute(
                            builder: (context) => DestinasiDetail(
                              listDestinasi: snapshot.requireData,
                              index: index,
                            ),
                          ),
                        );
                      },
                      child: ListTile(
                        leading: Image.network(
                            "${snapshot.data![index]['photo']}",
                            width: 100,
                            fit: BoxFit.cover),
                        title: Text(
                          "${snapshot.data![index]['nama']}",
                          style: const TextStyle(
                              fontWeight: FontWeight.bold,
                              color: Colors.black87),
                        ),
                        subtitle: Text("${snapshot.data![index]['wilayah']}"),
                      ),
                    ),
                  ),
                );
              },
            );
          }
          return const CircularProgressIndicator();
        },
      ),
    );
  }
}
