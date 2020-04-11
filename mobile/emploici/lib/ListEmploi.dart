import 'dart:collection';
import 'dart:convert';

import 'package:emploici/api/api.dart';
import 'package:emploici/main.dart';
import 'package:emploici/model/job.dart';
import 'package:emploici/model/user.dart';
import 'package:emploici/other/card_item.dart';
import 'package:find_dropdown/find_dropdown.dart';
import 'package:flutter/material.dart';
import 'package:flutter/widgets.dart';
import 'package:getflutter/getflutter.dart';
import 'package:emploici/other/data.dart';





class ListEmploi extends StatefulWidget {
  ListEmploi({Key key}) : super(key: key);

  @override
  _ListEmploiState createState() {
    return _ListEmploiState();
  }
}

class _ListEmploiState extends State<ListEmploi>  with SingleTickerProviderStateMixin,
    AutomaticKeepAliveClientMixin{

  Future<List> jobs ;
  List<Job> jobList = [];
  List<Job> globalJob = [];
  bool searchActive = false;
  TextEditingController _nom = new TextEditingController();
  String _niveau = '';
  String _secteur = '';
  String _typeoffres = '';
  List<String> itemsNiveau = [
    "BAC+8",
    "BAC+7",
    "BAC+6",
    "BAC+5",
    "BAC+4",
    "BAC+3",
    "BAC+2",
    "BAC+1",
    "BAC",
    "BT",
    "BP",
    "TERMINALE",
    "BEPC",
    "BEP",
    "CAP",
    "CEPE",
    "CM2",
  ];
  List<String> itemsTypeOffre = [
    "TOUT" ,"EMPLOI","STAGE","INTERIM","FREELANCE","CONSULTANCE"
  ];
  List<String> itemsSecteurActivite = [
  "Agroalimentaire",
  "Banque / Assurance",
  "Bois / Papier ","Carton / Imprimerie",
  "BTP ","Matériaux de construction",
  "Chimie / Parachimie",
  "Commerce / Négoce"," Distribution",
  "Édition / Communication ","Multimédia",
  "Électronique / Électricité",
  "Études et conseils",
  "Industrie pharmaceutique",
  "Informatique / Télécoms",
  "Machines et équipements "," Automobile",
  "Métallurgie ","Travail du métal",
  "Plastique / Caoutchouc",
  "Services aux entreprises",
  "Textile / Habillement ","Chaussure",
  "Transports / Logistique"];

  @override
  void initState() {
    super.initState();
    jobs = getJobs();
  }

  @override
  void dispose() {
    super.dispose();
  }

  void search(){

    List<Job> jobLista = [];

    print(jobList.length.toString() + "job");

    globalJob.forEach((element) {
      if(jobLista.contains(element) == false) {
        if(_nom.text.isNotEmpty) {
          if(element.titre.toLowerCase().contains(_nom.text.toLowerCase())) {
              jobLista.add(element);
          }
        }
      }
        if(jobLista.contains(element) == false) {
        if(_niveau.isNotEmpty) {
          if(element.niveauetude.toLowerCase().contains(_niveau.toLowerCase())) {
              jobLista.add(element);
          }
        }
        }
        if(jobLista.contains(element) == false) {
        if(_secteur.isNotEmpty) {
          if(element.secteuractivite.toLowerCase().contains(_secteur.toLowerCase()) ) {
          jobLista.add(element);
          }
        }
        }
        if(jobLista.contains(element) == false) {
          print(jobLista.length.toString() +" JoblistaZ");
          if(_typeoffres.isNotEmpty) {
            if(_typeoffres.toLowerCase() == "TOUT".toLowerCase()) {
              jobLista.add(element);
            }else {
              if(element.typeoffre.toLowerCase().contains(_typeoffres.toLowerCase())) {
                jobLista.add(element);
              }
            }
          }
        }

    });
    print(jobLista.length.toString() +" JoblistaZ");
    setState(() {
      jobList.clear();
      jobLista.forEach((element) {jobList.add(element);});
      jobLista.clear();
      searchActive = true;
    });

  }
  @override
  Widget build(BuildContext context) {

        super.build(context);
    return Scaffold(
        appBar: GFAppBar(
          automaticallyImplyLeading: false,
          title: Text("Emploici.net "),
          actions: <Widget>[
            GFIconButton(
              padding: EdgeInsets.fromLTRB(0, 0, 10, 0),
              icon: Icon(
                Icons.search,
                color: Colors.white, size: 30,),
              onPressed: () async {
                await animated_dialog_box.showRotatedAlert(
                    title: Center(
                        child:
                        Text("Recherche")
                    ), // IF YOU WANT TO ADD
                        context: context,
                        firstButton: MaterialButton(
                          // FIRST BUTTON IS REQUIRED
                          shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(4),
                      ),
                      color: Colors.blue,
                      child: Text('Chercher'),
                      onPressed: () {
                            search();
                            setState(() {
                              _nom = new TextEditingController();
                              _secteur = "";
                              _niveau = "";
                              _typeoffres = "";
                            });
                        Navigator.of(context).pop();
                      },
                    ),
                    secondButton: MaterialButton(
                      // OPTIONAL BUTTON
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(4),
                      ),
                      color: Colors.blue,
                      child: Text('Annuler'),
                      onPressed: () {
                        setState(() {
                          globalJob.clear();
                          jobList.clear();
                          searchActive = false;
                        });

                        Navigator.of(context).pop();
                      },
                    ),
                    icon: Icon(Icons.search ),
                    yourWidget: Container(
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: <Widget>[
                          TextField(
                            controller: _nom,
                            decoration: InputDecoration.collapsed(
                                hintText: 'Nom',border: OutlineInputBorder(
                              borderSide: const BorderSide(color: Colors.grey, width: 0.0),
                            ), hintStyle: TextStyle(color: Colors.black,)),
                          ),  SizedBox(height: 10.0),
                        FindDropdown(
                          items: itemsTypeOffre,
                          label: "Type d'offre",
                          selectedItem: "Aucun",
                          searchBoxDecoration: InputDecoration(hintText: "Chercher"),
                          onChanged: (String item){
                            setState(() {
                              jobList.clear();
                              searchActive = true;
                              _typeoffres= item;
                            });
                          },
                        ),  SizedBox(height: 10.0),
                        FindDropdown(
                          items: itemsSecteurActivite,
                          label: "Secteur d'activité",
                          selectedItem: "Aucun",
                          searchBoxDecoration: InputDecoration(hintText: "Chercher"),
                          onChanged: (String item){
                            setState(() {
                              jobList.clear();
                              searchActive = true;
                              _secteur = item;
                            });
                          },
                        ), SizedBox(height: 10.0),

                      FindDropdown(
                        items: itemsNiveau,
                        label: "Niveau d'etude",
                        selectedItem: "Aucun",
                        searchBoxDecoration: InputDecoration(hintText: "Chercher"),
                        onChanged: (String item){
                          setState(() {
                            jobList.clear();
                            searchActive = true;
                            _niveau = item;
                          });
                        },
                      ),
                        ],
                      )
                    ));
              },
              type: GFButtonType.transparent,
            ),
          ],
        ),

        body: new FutureBuilder<List>(
            future: jobs,
            builder: (context, snapshot) {
              if(snapshot.hasData) {
                if(searchActive == false){
                  for(int i = 0; i<  snapshot.data.length; i++){
                    Map<String, dynamic> jobJson  = snapshot.data[i];
                    Job job =  Job(
                      id: jobJson['id'] ,
                      titre: jobJson['titre'] ,
                      typeoffre: jobJson['typeoffre'] ,
                      secteuractivite: jobJson['secteuractivite'] ,
                      niveauetude: jobJson['niveauetude'] ,
                      lieu: jobJson['lieu'] ,
                      datelimite: jobJson['datelimite'] ,
                      description: jobJson['description'] ,
                      nombreposte: jobJson['nombreposte'] ,);
                    User user = new User();
                    user.link = '$SERVER_BASE_IP' + '/storage/'+ jobJson['user']['link'];
                    job.user = user;


                      globalJob.add(job);
                      jobList.add(job);
                    }
                }
                if(jobList.isNotEmpty){
                  return Container(
                      child: Stack(
                        children: <Widget>[
                          ListView.separated(
                            padding: EdgeInsets.all(10),
                            separatorBuilder: (BuildContext context, int index) {
                              return Align(
                                alignment: Alignment.centerRight,
                                child: Container(
                                  height: 0.5,
                                  width: MediaQuery
                                      .of(context)
                                      .size
                                      .width / 1.3,
                                  child: Divider(),
                                ),
                              );
                            },
                            itemCount: jobList.length,
                            itemBuilder: (BuildContext context, int index) {
                              return  CardItem(job : jobList[index] );
                            },
                          ),
                        ],
                      )
                  );
                }
                else {
                  return Container(
                    padding: EdgeInsets.fromLTRB(20, 10, 20, 10),
                    child: Center(
                      child:Column(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Text("Aucun job ne corespond à vos recherche",style: TextStyle(fontSize: 23),),
                          GFButton(
                            onPressed: (){
                              setState(() {
                                searchActive = false;
                              });
                            },
                            color: Colors.blue,
                            text: "Recharger",
                            textStyle:  TextStyle(fontSize: 20, color: Colors.white),
                            blockButton: true,
                          ),
                        ],
                      )
                    ),
                  );
                }
              }
              // By default, show a loading spinner.
              return Center(
                child:  GFLoader(
                    type:GFLoaderType.circle
                ),/*GFLoader(
                    type:GFLoaderType.circle
                ),*/
              );
            })
    );
  }
  void displayDialog(BuildContext context, String title, String text) =>
      showDialog(
        context: context,
        builder: (context) =>
            AlertDialog(
                title: Text(title),
                content: Text(text)
            ),
      );


  @override
  bool get wantKeepAlive => true;
}
