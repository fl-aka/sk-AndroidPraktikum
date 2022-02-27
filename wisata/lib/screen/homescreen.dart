import 'package:flutter/material.dart';
import 'package:wisata/api/api_destinasi.dart';
import 'package:wisata/api/api_kategori.dart';
import 'package:wisata/widget/destinasi_kategori.dart';
import 'package:wisata/widget/list_destinasi.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  List listkategari = [];

  @override
  void initState() {
    getKategori().then((data) {
      setState(() {
        listkategari = data;
      });
    });
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          title: const Text('pariwisata banjarmasin'),
          backgroundColor: Colors.redAccent,
        ),
        drawer: Drawer(
          child: FutureBuilder<List>(
            future: getKategori(),
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                return ListView.builder(
                  itemCount: snapshot.data!.length,
                  itemBuilder: (context, index) {
                    var listKategori = snapshot.data![index];
                    return ListTile(
                      title: Text(snapshot.data![index]['nama']),
                      onTap: () {
                        Navigator.of(context).push(MaterialPageRoute(
                            builder: (context) => destinasikategori(
                                kategori: listKategori[index])));
                      },
                    );
                  },
                );
              }
              return const CircularProgressIndicator();
            },
          ),
        ),
        body: SingleChildScrollView(
          child: FutureBuilder<List>(
              future: getDestinasi(),
              builder: (context, snapshot) {
                if (snapshot.hasError) debugPrint(snapshot.error.toString());
                return snapshot.hasData
                    ? ListDestinasi(
                        listDestinasi: snapshot.data,
                      )
                    : const Center(
                        child: CircularProgressIndicator(),
                      );
              }),
        ),
      ),
    );
  }
}
