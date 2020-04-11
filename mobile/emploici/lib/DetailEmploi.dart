import 'package:emploici/LoginPage.dart';
import 'package:emploici/HomePage.dart';
import 'package:emploici/main.dart';
import 'package:emploici/api/api.dart';
import 'package:emploici/model/job.dart';
import 'package:emploici/model/user.dart';
import 'package:emploici/other/data.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/painting.dart';
import 'package:flutter_widget_from_html_core/flutter_widget_from_html_core.dart';
import 'package:getflutter/getflutter.dart';
import 'package:http/http.dart' as http;
import 'package:intl/intl.dart';
import 'package:marquee/marquee.dart';
import 'package:page_transition/page_transition.dart';
import 'package:url_launcher/url_launcher.dart';

import 'LoginPage.dart';


class DetailEmploi extends StatefulWidget {
  int id;
  DetailEmploi(this.id);
  @override
  _MyDetailEmploiState createState() => new _MyDetailEmploiState();
}

class _MyDetailEmploiState extends State<DetailEmploi> {
  Future futureJob;
  @override
  void initState() {
    super.initState();
    futureJob = getJob(widget.id);

  }

  @override
  Widget build(BuildContext context) {
    return  new Scaffold(
      appBar: AppBar(
          title: Text("Emploici.net "),
          leading: IconButton(
            icon: Icon(
              Icons.keyboard_backspace,
            ),
            onPressed: ()=>Navigator.pop(context),
          )),
        body: FutureBuilder(
            future: futureJob,
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                Map<String, dynamic> detailsJson  = snapshot.data;
                String natureLimite = detailsJson['datelimite'];
                String traitement = natureLimite.replaceAll("-", "/").substring(0, natureLimite.indexOf('T'));
                return   Stack(
                    alignment: AlignmentDirectional.topStart,
                  children: <Widget>[
                    SingleChildScrollView(

                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.start,
                          children: <Widget>[
                            SizedBox(height: 10.0),
                            Container(
                                width: 150.0,
                                height: 150.0,
                                decoration: BoxDecoration(
                                    color: Colors.white,
                                    image: DecorationImage(
                                        image: NetworkImage(
                                            '$SERVER_BASE_IP' + '/storage/'+ detailsJson['user']['link'] ),
                                        fit: BoxFit.cover),
                                   // borderRadius: BorderRadius.all(Radius.circular(75.0)),
                                    boxShadow: [
                                      BoxShadow(blurRadius: 7.0, color: Colors.black)
                                    ])),
                            SizedBox(height: 10.0),
                            Text(
                              detailsJson['titre'],
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                  fontSize: 22.0,

                                  fontWeight: FontWeight.bold,
                                  fontFamily: 'Montserrat'),
                            ),
                            Text(
                              detailsJson['user']['email'],
                              textAlign: TextAlign.center,
                              style: TextStyle(
                                  fontSize: 22.0,
                                  fontWeight: FontWeight.bold,
                                  fontFamily: 'Montserrat'),
                            ),

                            Container(
                                child: Row(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  children: <Widget>[
                                    Container(child: Icon(
                                      Icons.add_location, color: Colors.black,
                                      size: 22.0,),),
                                    Container(
                                        child: Text(detailsJson['lieu'],
                                          textAlign: TextAlign.left,
                                          style: TextStyle(color: Colors.black, fontSize: 22.0,
                                          ),
                                        )
                                    ),
                                  ],)),
                            SizedBox(height: 30.0),
                            Center(
                              child:Container(
                                padding: EdgeInsets.fromLTRB(50, 0, 30, 0),
                                child: Row(
                                  crossAxisAlignment: CrossAxisAlignment.center,
                                  children: <Widget>[

                                    Column(
                                      crossAxisAlignment:  CrossAxisAlignment.start,
                                      children: <Widget>[
                                        Text(
                                          'Date limite          :',
                                          textAlign: TextAlign.left,
                                          style: TextStyle(
                                              fontSize: 15.0,
                                              fontFamily: 'Montserrat'),
                                        ),
                                        Text(
                                          'Nombre de poste:' ,
                                          textAlign: TextAlign.start,
                                          style: TextStyle(
                                              fontSize: 15.0,
                                              fontFamily: 'Montserrat'),
                                        ),
                                        Text(
                                          'Nature du travail :',
                                          textAlign: TextAlign.left,
                                          style: TextStyle(
                                              fontSize: 15.0,
                                              fontFamily: 'Montserrat'),
                                        ),
                                        Text(
                                          "Niveau d'etude   :",
                                          textAlign: TextAlign.left,
                                          style: TextStyle(
                                              fontSize: 15.0,
                                              fontFamily: 'Montserrat'),
                                        ),
                                      ],
                                    ),
                                    Column(
                                      crossAxisAlignment: CrossAxisAlignment.start,
                                      children: <Widget>[
                                        Text(
                                          traitement.split('/')[2] + "/" + traitement.split('/')[1] + "/" + traitement.split('/')[0] ,
                                          textAlign: TextAlign.left,
                                          style: TextStyle(
                                              fontSize: 15.0,
                                              fontFamily: 'Montserrat'),
                                        ),
                                        Text(
                                          detailsJson['nombreposte'].toString() ,
                                          textAlign: TextAlign.start,
                                          style: TextStyle(
                                              fontSize: 15.0,
                                              fontFamily: 'Montserrat'),
                                        ),
                                        Text(
                                          detailsJson['typeoffre'],
                                          textAlign: TextAlign.left,
                                          style: TextStyle(
                                              fontSize: 15.0,
                                              fontFamily: 'Montserrat'),
                                        ),
                                        Text(
                                          detailsJson['niveauetude'],
                                          textAlign: TextAlign.left,
                                          style: TextStyle(
                                              fontSize: 15.0,
                                              fontFamily: 'Montserrat'),
                                        ),
                                      ],
                                    ),


                                  ],
                                ),
                              ),
                            ),

                            SizedBox(height: 30.0),
                            Text(
                              'Description',
                              textAlign: TextAlign.left,
                              style: TextStyle(
                                  fontSize: 15.0,
                                  fontFamily: 'Montserrat'),
                            ),
                            Padding(
                              padding: EdgeInsets.fromLTRB(10, 10, 10, 3),
                              child: HtmlWidget(detailsJson['description']) /*Text(
                                detailsJson['description'] ,
                                style: TextStyle(
                                    fontSize: 15.0,
                                    fontStyle: FontStyle.italic,
                                    fontFamily: 'Montserrat'),
                              )*/,
                            )
                            ,
                            SizedBox(height: 25.0),
                           GFButton(
                              onPressed: (){
                                launch("$SERVER_BASE_IP/details/" + detailsJson['id'].toString());
                              },
                              text: "Postuler",
                              shape: GFButtonShape.square,
                              blockButton: true,
                              size: GFSize.MEDIUM,
                              color: Colors.blue
                            ),
                            /*    Container(
                              height: 30.0,
                              width: 95.0,
                              child: Material(
                                borderRadius: BorderRadius.circular(20.0),
                                shadowColor: Colors.redAccent,
                                color: Colors.red,
                                elevation: 7.0,
                                child: GestureDetector(
                                  onTap: () async {

                                  },
                                  child: Center(
                                    child: Text(
                                      'Deconnection',
                                      style: TextStyle(color: Colors.white),
                                    ),
                                  ),
                                ),
                              ))*/
                          ],
                        )
                    )
                  ],
                );
              } else if (snapshot.hasError) {
                return Center(
                  child: Text("Veuillez vous connecté", style: TextStyle(fontSize: 12),),
                );
              }
              // By default, show a loading spinner.
              return Center(
                child:  GFLoader(
                    type:GFLoaderType.circle
                ),
              );
            },
          ),
    );

  }
}

class getClipper extends CustomClipper<Path> {
  @override
  Path getClip(Size size) {
    var path = new Path();

    path.lineTo(0.0, size.height / 1.9);
    path.lineTo(size.width + 125, 0.0);
    path.close();
    return path;
  }

  @override
  bool shouldReclip(CustomClipper<Path> oldClipper) {
    // TODO: implement shouldReclip
    return true;
  }
}
