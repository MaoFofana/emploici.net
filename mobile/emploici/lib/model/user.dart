import 'package:json_annotation/json_annotation.dart';
part 'user.g.dart';

@JsonSerializable()
class User {
  final String name;
  final String prenom;
  final String fonction;
  final String link;
  final String cv;
  final String role;
  final String email;
  final int id;
  final String emailVerifiedAt;
  final String createdAt;
  final String updatedAt;

  User({this.emailVerifiedAt, this.createdAt, this.updatedAt, this.id ,this.name, this.prenom, this.fonction, this.link, this.cv, this.role,  this.email});

  /// A necessary factory constructor for creating a new User instance
  /// from a map. Pass the map to the generated `_$UserFromJson()` constructor.
  /// The constructor is named after the source class, in this case, User.
  factory User.fromJson(Map<String, dynamic> json) => _$UserFromJson(json);

  /// `toJson` is the convention for a class to declare support for serialization
  /// to JSON. The implementation simply calls the private, generated
  /// helper method `_$UserToJson`.
  Map<String, dynamic> toJson() => _$UserToJson(this);

}
