// ignore: avoid_web_libraries_in_flutter
import 'dart:html';

class IdRepository {
  final Storage _localStorage = window.localStorage;

  Future save(String id) async {
    _localStorage['selected_id'] = id;
  }

  String getId()  => _localStorage['selected_id'];

  Future invalidate() async {
    _localStorage.remove('selected_id');
  }
}