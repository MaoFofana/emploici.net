// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'user.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

User _$UserFromJson(Map<String, dynamic> json) {
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

Map<String, dynamic> _$UserToJson(User instance) => <String, dynamic>{
      'name': instance.name,
      'prenom': instance.prenom,
      'fonction': instance.fonction,
      'link': instance.link,
      'cv': instance.cv,
      'role': instance.role,
      'email': instance.email,
      'id': instance.id,
      'emailVerifiedAt': instance.emailVerifiedAt,
      'createdAt': instance.createdAt,
      'updatedAt': instance.updatedAt,
    };
