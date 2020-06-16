import 'dart:convert';

import 'package:emploici/Data/GlobalVariable.dart';
import 'package:emploici/Data/Model/Job.dart';
import 'package:http/http.dart' as http;

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
