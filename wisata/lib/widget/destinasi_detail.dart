import 'package:flutter/material.dart';
import 'package:flutter_html/flutter_html.dart';

class DestinasiDetail extends StatelessWidget {
  final List listDestinasi;
  final int index;
  const DestinasiDetail(
      {Key? key, required this.listDestinasi, required this.index})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('${listDestinasi[index]['name']}'),
        backgroundColor: Colors.redAccent,
      ),
      body: ListView(
        padding: const EdgeInsets.all(16.0),
        children: [
          Image.network('${listDestinasi[index]['photo']}'),
          Container(
            padding: const EdgeInsets.all(32.0),
            child: Text(
              '${listDestinasi[index]['nama']}',
              style: const TextStyle(
                fontWeight: FontWeight.bold,
              ),
            ),
          ),
          Container(
            padding: const EdgeInsets.all(32.0),
            child: Html(
              data: listDestinasi[index]['konten'],
            ),
          )
        ],
      ),
    );
  }
}
