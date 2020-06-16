
class User {
  String name;
  String prenom;
  String fonction;
  String link;
  String cv;
  String role;
  String email;
  int id;
  String emailVerifiedAt;
  String createdAt;
  String updatedAt;

  User({this.emailVerifiedAt, this.createdAt, this.updatedAt, this.id ,this.name, this.prenom, this.fonction, this.link, this.cv, this.role,  this.email});

  /// A necessary factory constructor for creating a new User this
  /// from a map. Pass the map to the generated `_$UserFromJson()` constructor.
  /// The constructor is named after the source class, in this case, User.
  factory User.fromJson(Map<String, dynamic> json) {
      return User(
        emailVerifiedAt: json['emailVerifiedAt'] as String,
        createdAt: json['createdAt'] as String,
        updatedAt: json['updatedAt'] as String,
        id: json['id'] as int,
        name: json['name'] as String,
        prenom: json['prenom'] as String,
        fonction: json['fonction'] as String,
        link: json['link'] as String,
        cv: json['cv'] as String,
        role: json['role'] as String,
        email: json['email'] as String,
      );
    }

  /// `toJson` is the convention for a class to declare support for serialization
  /// to JSON. The implementation simply calls the private, generated
  /// helper method `_$UserToJson`.
  Map<String, dynamic> toJson() => <String, dynamic>{
    'name': this.name,
    'prenom': this.prenom,
    'fonction': this.fonction,
    'link': this.link,
    'cv': this.cv,
    'role': this.role,
    'email': this.email,
    'id': this.id,
    'emailVerifiedAt': this.emailVerifiedAt,
    'createdAt': this.createdAt,
    'updatedAt': this.updatedAt,
  };


}
