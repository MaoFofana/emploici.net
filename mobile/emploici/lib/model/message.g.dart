// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'message.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

MessageCountUsers _$MessageCountUsersFromJson(Map<String, dynamic> json) {
  return MessageCountUsers(
    user: User.fromJson(json['user'] as Map<String, dynamic>),
    count: json['count'] as int,
    dernier: json['dernier'] as String,
  );
}

Map<String, dynamic> _$MessageCountUsersToJson(MessageCountUsers instance) =>
    <String, dynamic>{
      'user': instance.user,
      'count': instance.count,
      'dernier': instance.dernier,
    };
