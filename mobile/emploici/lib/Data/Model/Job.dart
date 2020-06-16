
import 'package:emploici/Data/Model/User.dart';

class Job  {
  int id;
  String titre;
  String typeoffre;
  String secteuractivite;
  String niveauetude;
  String lieu;
  String datelimite;
  String description;
  int nombreposte;
  User user;

  Job({this.id, this.titre, this.typeoffre,
    this.secteuractivite, this.niveauetude, this.lieu, this.datelimite, this.description, this.nombreposte, this.user});



  Map<String, dynamic> toJson() => <String, dynamic>{
    'id': this.id,
    'titre': this.titre,
    'typeoffre': this.typeoffre,
    'secteuractivite': this.secteuractivite,
    'niveauetude': this.niveauetude,
    'lieu': this.lieu,
    'datelimite': this.datelimite,
    'description': this.description,
    'nombreposte': this.nombreposte,
    'user': this.user,
  };

  factory Job.fromJson(Map<String, dynamic> json) {
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



}