import 'dart:convert';
import 'package:cross_local_storage/cross_local_storage.dart';
import 'package:emploici/Constante.dart';
import 'package:emploici/main.dart';
import 'package:emploici/model/chatmodel.dart';
import 'package:emploici/model/job.dart';
import 'package:emploici/model/message.dart';
import 'package:http/http.dart' as http;
import 'package:emploici/model/user.dart';



Future<User> getMe() async {
  LocalStorageInterface _localStorageInterface = await LocalStorage.getInstance();
  var token = _localStorageInterface.getString(tokenName);
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
  LocalStorageInterface _localStorageInterface = await LocalStorage.getInstance();
  var token = _localStorageInterface.getString(tokenName);
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
   return null;
  }
}



Future<List> getMessages(int id) async {
  LocalStorageInterface _localStorageInterface = await LocalStorage.getInstance();
  var token = _localStorageInterface.getString(tokenName);
  final response = await http.get(
    "$SERVER_IP/listmessage/$id",
    headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
      'Accept': 'application/json'},
  );
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
      LocalStorageInterface _localStorageInterface   = await LocalStorage.getInstance();
      _localStorageInterface.remove('token');
      final result = await _localStorageInterface.setString('token', jwt["access_token"]);
      return await getMe();
    }
    return null;
  }else {
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

Future<List> getJobs() async{
  var res = await http.get("$SERVER_BASE_IP/api/jobs");
  List<Job> listJob;
  if(res.statusCode == 200){
    var object = json.decode(res.body);
    var data = object['data'] as List;
   var dataRevers = new List.from(data.reversed);
    return dataRevers;
  }
  return null;
}


Future getJob(int id) async{
  var res = await http.get("$SERVER_BASE_IP/api/jobs/$id");
  if(res.statusCode == 200){
    var object = json.decode(res.body);
    var data = object['data'];
    print(data);
   return data;
  }else {
    return null;
  }

}


Future desableLu(int id ) async {
  var res = await  http.post("$SERVER_IP/lu",body: {
    "id": id.toString()
  });

}