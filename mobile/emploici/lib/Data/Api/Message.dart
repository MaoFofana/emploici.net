import 'dart:convert';
import 'dart:developer';

import 'package:emploici/Data/GlobalVariable.dart';
import 'package:http/http.dart' as http;
import 'package:localstorage/localstorage.dart';


Future desableLu(int id ) async {
  var res = await  http.post("$SERVER_IP/lu",body: {
    "id": id.toString()
  });

}

Future<String> sendMessage(String message, int to, int from) async{
  var res = await http.post("$SERVER_IP/message/send" ,
      headers: {'Content-type': 'application/json', 'Accept': 'application/json'},
      body: jsonEncode({
        "message": message,
        "from" : from.toString(),
        "to": to.toString(),
    })
  );
  log(res.body);
  return null;
}

Future<List> getMessages(int id) async {
  LocalStorage storage = new LocalStorage("data");
  var token = storage.getItem("token");

  final response = await http.get(
    "$SERVER_IP/listmessage/$id",
    headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
      'Accept': 'application/json'},
  );
  var  mapJson = jsonDecode(response.body) as List;
  var mapJsonNew = new List.from(mapJson.reversed) ;
  return mapJsonNew;
}
