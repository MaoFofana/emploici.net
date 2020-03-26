
import 'package:emploici/model/user.dart';
import 'package:json_annotation/json_annotation.dart';
part 'message.g.dart';


@JsonSerializable(nullable: false)
class MessageCountUsers{
  final User user;
  final int count;
  final String dernier;

  MessageCountUsers({this.user, this.count, this.dernier});


  /// A necessary factory constructor for creating a new User instance
  /// from a map. Pass the map to the generated `_$UserFromJson()` constructor.
  /// The constructor is named after the source class, in this case, User.
  factory MessageCountUsers.fromJson(Map<String, dynamic> json) => _$MessageCountUsersFromJson(json);

  /// `toJson` is the convention for a class to declare support for serialization
  /// to JSON. The implementation simply calls the private, generated
  /// helper method `_$UserToJson`.
  Map<String, dynamic> toJson() => _$MessageCountUsersToJson(this);
}

class Message {
  final int id;
  final String message;
  final String email;
  final String nom;
  final int to;
  final int from;


  Message({this.id, this.message, this.email, this.nom, this.to, this.from});

  Message.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        message = json['message'],
        email = json['email'],
        nom = json['nom'],
        to = json['to'],
        from = json['from'];



}

