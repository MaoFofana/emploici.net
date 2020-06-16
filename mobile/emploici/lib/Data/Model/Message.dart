
import 'package:emploici/Data/Model/User.dart';

class MessageCountUsers{
  final User user;
  final int count;
  final String dernier;

  MessageCountUsers({this.user, this.count, this.dernier});
  factory MessageCountUsers.fromJson(Map<String, dynamic> json){
    return MessageCountUsers(
      user: User.fromJson(json['user']),
      count: json['count'] as int,
      dernier: json['dernier'] as String,
    );
  }

  Map<String, dynamic> toJson() =>
      <String, dynamic>{
        'user': this.user,
        'count': this.count,
        'dernier': this.dernier,
      };
}

class Message {
  final int id;
  final String message;
  final String email;
  final String nom;
  final int to;
  final int from;

  Message({this.id, this.message, this.email, this.nom, this.to, this.from});

  factory Message.fromJson(Map<String, dynamic> json) {
    return Message(
        id : json['id'],
        message : json['message'],
        email : json['email'],
        nom : json['nom'],
        to :json['to'],
        from : json['from']
    );
  }
}

