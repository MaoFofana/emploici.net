import 'dart:convert';
import 'dart:developer';
import 'dart:html';
import 'dart:io';

import 'package:emploici/main.dart';
import 'package:emploici/model/chatmodel.dart';
import 'package:emploici/model/message.dart';
import 'package:emploici/other/IdRepository.dart';
import 'package:http/http.dart' as http;
import 'package:emploici/model/user.dart';

final Storage _localStorage = window.localStorage;
Future<User> getMe() async {
  var idRepository = new IdRepository();
  var token = idRepository.getId();
  final response = await http.get(
      "$SERVER_IP/me",
    headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
      'Accept': 'application/json'},
  );

  if (response.statusCode == 200) {
    // If the server did return a 200 OK response,
    // then parse the JSON.
    return User.fromJson(json.decode(response.body));
  } else {
    // If the server did not return a 200 OK response,
    // then throw an exception.
    return null;
  }
}


Future<ChatModel> getUsers() async {
  var idRepository = new IdRepository();
  var token = idRepository.getId();
  List<MessageCountUsers> listMessage ;
  final response = await http.get(
    "$SERVER_IP/users",
    headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
      'Accept': 'application/json'},
  );


  if (response.statusCode == 200) {
      var data = json.decode(response.body) as List;

      listMessage = data.map<MessageCountUsers>((json) => MessageCountUsers.fromJson(json)).toList();
      var user = await getMe();
      var chatModel = new ChatModel(user, listMessage);
    return chatModel;


  } else {
    throw Exception('Erreur lors de la recuperation');
  }
}



Future<List> getMessages(int id) async {
  var idRepository = new IdRepository();
  var token = idRepository.getId();
  final response = await http.get(
    "$SERVER_IP/listmessage/$id",
    headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
      'Accept': 'application/json'},
  );
  List<Message> messages;
  var  mapJson = jsonDecode(response.body) as List;
  var mapJsonNew = new List.from(mapJson.reversed) ;
  return mapJsonNew;
}




Future<User> attemptLogIn(String username, String password) async {
  await http.get(
      "$SERVER_IP/logout"
  );

  var res = await http.post(
      "$SERVER_IP/login",
      body: {
        "email": username,
        "password": password
      }
  );
  Map<String, dynamic> jwt = jsonDecode(res.body);
  if (res.statusCode == 200) {
    if (jwt["access_token"] != null) {
      var re = new IdRepository();
      re.invalidate();
      re.save(jwt["access_token"]);
      return await getMe();
    }
    return null;
  }
}

Future<String> sendMessage(String message, int to, int from) async{
  var res = await http.post("$SERVER_IP/message/send" ,body: {
    "message": message,
    "from" : from.toString(),
    "to": to.toString(),
  }
  );
  return null;
}
