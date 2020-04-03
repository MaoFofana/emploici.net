// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'job.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

Job _$JobFromJson(Map<String, dynamic> json) {
  return Job(
    id: json['id'] as int,
    titre: json['titre'] as String,
    typeoffre: json['typeoffre'] as String,
    secteuractivite: json['secteuractivite'] as String,
    niveauetude: json['niveauetude'] as String,
    lieu: json['lieu'] as String,
    datelimite: json['datelimite'] as String,
    description: json['description'] as String,
    nombreposte: json['nombreposte'] as int,
    user: json['user'] == null
        ? null
        : User.fromJson(json['user'] as Map<String, dynamic>),
  );
}

Map<String, dynamic> _$JobToJson(Job instance) => <String, dynamic>{
      'id': instance.id,
      'titre': instance.titre,
      'typeoffre': instance.typeoffre,
      'secteuractivite': instance.secteuractivite,
      'niveauetude': instance.niveauetude,
      'lieu': instance.lieu,
      'datelimite': instance.datelimite,
      'description': instance.description,
      'nombreposte': instance.nombreposte,
      'user': instance.user,
    };
