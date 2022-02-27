import 'package:dio/dio.dart';

class KategoriApi {
  Future<List> getKategori() async {
    var dio = Dio();
    Response response = await dio.get('http://wisata.test/api/kategori');
    return response.data['data'];
  }
}
