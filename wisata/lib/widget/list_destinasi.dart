import 'package:flutter/material.dart';
import 'package:wisata/widget/destinasi_detail.dart';

class ListDestinasi extends StatelessWidget {
  final List? listDestinasi;
  const ListDestinasi({Key? key, required this.listDestinasi})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
        scrollDirection: Axis.vertical,
        shrinkWrap: true,
        itemCount: listDestinasi == null ? 0 : listDestinasi!.length,
        itemBuilder: (context, index) {
          return InkWell(
            onTap: () {
              Navigator.of(context).push(MaterialPageRoute(
                builder: (context) => DestinasiDetail(
                    listDestinasi: listDestinasi!, index: index),
              ));
            },
            child: Container(
              padding: const EdgeInsets.all(8.0),
              child: Card(
                child: ListTile(
                  leading: Image.network(
                    listDestinasi![index]['photo'],
                    width: 100,
                    fit: BoxFit.cover,
                  ),
                  title: Text(
                    listDestinasi![index]['nama'],
                    style: const TextStyle(
                      fontWeight: FontWeight.bold,
                      color: Colors.black87,
                    ),
                  ),
                  subtitle: Text(
                      "${listDestinasi![index]['kategori']}|${listDestinasi![index]['wilayah']}"),
                ),
              ),
            ),
          );
        });
  }
}
