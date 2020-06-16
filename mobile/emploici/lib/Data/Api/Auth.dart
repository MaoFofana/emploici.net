import 'dart:convert';
import 'dart:developer';
import 'package:emploici/Data/GlobalVariable.dart';
import 'package:emploici/Data/Model/Chat.dart';
import 'package:emploici/Data/Model/Message.dart';
import 'package:emploici/Data/Model/User.dart';
import 'package:http/http.dart' as http;
import 'package:localstorage/localstorage.dart';


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
  log(res.body);
  Map<String, dynamic> jwt = jsonDecode(res.body);
  if (res.statusCode == 200) {
    if (jwt["access_token"] != null) {
      LocalStorage storage = new LocalStorage("data");
      storage.deleteItem(tokenName);
      storage.setItem(tokenName, jwt["access_token"]);
      return await getMe();
    }
    return null;
  }else {
    return null;
  }
}

Future<User> getMe() async {
  LocalStorage storage = new LocalStorage("data");
  var token = storage.getItem(tokenName);
  if(token != null) {
    final response = await http.get(
      "$SERVER_IP/me",
      headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
        'Accept': 'application/json'},
    );
    if (response.statusCode == 200) {
      return User.fromJson(json.decode(response.body));
    } else {
      return null;
    }
  }
  return null;
}

Future<ChatModel> getUsers() async {
  LocalStorage storage = new LocalStorage("data");
  var token = storage.getItem(tokenName);
  List<MessageCountUsers> listMessage ;
  final response = await http.get(
    "$SERVER_IP/users",
    headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
      'Accept': 'application/json'},
  );

  if (response.statusCode == 200) {
    var data = json.decode(response.body) as List;
    listMessage = data.map<MessageCountUsers>((json) => MessageCountUsers.fromJson(json)).toList();
    List<MessageCountUsers> listMessageFiltre = new List();
    listMessage.forEach((element) {
      if(element.dernier != null){
        listMessageFiltre.add(element);
      }
    });
    var user = await getMe();
    var chatModel = new ChatModel(user, listMessageFiltre);
    return chatModel;
  } else {
    return null;
  }
}