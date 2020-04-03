
import 'package:emploici/model/user.dart';
import 'package:json_annotation/json_annotation.dart';
part 'job.g.dart';


@JsonSerializable()
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


  factory Job.fromJson(Map<String, dynamic> json) => _$JobFromJson(json);
  Map<String, dynamic> toJson() => _$JobToJson(this);
  
}