import 'package:cross_local_storage/cross_local_storage.dart';
import 'package:emploici/LoginPage.dart';
import 'package:emploici/main.dart';
import 'package:emploici/api/api.dart';
import 'package:emploici/model/user.dart';
import 'package:flutter/material.dart';
import 'package:getflutter/getflutter.dart';
import 'package:http/http.dart' as http;
import 'package:page_transition/page_transition.dart';
import 'Constante.dart';
import 'LoginPage.dart';


class Profile extends StatefulWidget {
  @override
  _MyProfileState createState() => new _MyProfileState();
}

class _MyProfileState extends State<Profile> {
  Future<User> futureUser;
  LocalStorageInterface _localStorageInterface;
  @override
  void initState() {
    super.initState();
    futureUser = getMe();
    _tokenVerified();
  }
  _tokenVerified() async {

    _localStorageInterface = await LocalStorage.getInstance();

  }
  @override
  Widget build(BuildContext context) {
    return  new Scaffold(
        body: FutureBuilder<User>(
      future: futureUser,
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          return new Stack(
            children: <Widget>[
                  ClipPath(
                    child: Container(color: Colors.black.withOpacity(0.8)),
                    clipper: getClipper(),
                  ),
                  Positioned(
                      width: 350.0,
                      top: MediaQuery.of(context).size.height / 5,
                      child: Column(
                        children: <Widget>[
                          Container(
                              width: 150.0,
                              height: 150.0,
                              decoration: BoxDecoration(
                                  color: Colors.red,
                                  image: DecorationImage(
                                      image: NetworkImage(
                                         "$SERVER_BASE_IP/storage/"+ snapshot.data.link),
                                      fit: BoxFit.cover),
                                  borderRadius: BorderRadius.all(Radius.circular(75.0)),
                                  boxShadow: [
                                    BoxShadow(blurRadius: 7.0, color: Colors.black)
                                  ])),
                          SizedBox(height: 90.0),
                          Text(
                            snapshot.data.name + " " + snapshot.data.prenom,
                            style: TextStyle(
                                fontSize: 30.0,
                                fontWeight: FontWeight.bold,
                                fontFamily: 'Montserrat'),
                          ),
                          SizedBox(height: 15.0),
                          Text(
                            snapshot.data.fonction,
                            style: TextStyle(
                                fontSize: 17.0,
                                fontStyle: FontStyle.italic,
                                fontFamily: 'Montserrat'),
                          ),
                          SizedBox(height: 25.0),
                          Container(
                              height: 30.0,
                              width: 95.0,
                              child: Material(
                                borderRadius: BorderRadius.circular(20.0),
                                shadowColor: Colors.redAccent,
                                color: Colors.red,
                                elevation: 7.0,
                                child: GestureDetector(
                                  onTap: () async {
                                    LocalStorageInterface _localStorageInterface = await LocalStorage.getInstance();
                                    var token = _localStorageInterface.getString(tokenName);
                                    final response = await http.get(
                                      "$SERVER_IP/logout",
                                      headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
                                        'Accept': 'application/json'},
                                    );
                                    if (response.statusCode == 200) {
                                      // If the server did return a 200 OK response,
                                      // then parse the JSON.
                                      _localStorageInterface.remove(tokenName);
                                      Navigator.push(
                                          context,
                                          PageTransition(type: PageTransitionType.fade, child: LoginPage()));
                                    } else {
                                      // If the server did not return a 200 OK response,
                                      // then throw an exception.
                                      throw Exception('Erreur lors de la recuperation');
                                    }
                                  },
                                  child: Center(
                                    child: Text(
                                      'Deconnection',
                                      style: TextStyle(color: Colors.white),
                                    ),
                                  ),
                                ),
                              ))
                        ],
                      ))
                ],
              );
        } else if (snapshot.hasError) {
          return Text("Veuillez vous connecté");
        }

        var token = _localStorageInterface.getString(tokenName);
        if(token != null){
          return Center(
            child: GFLoader(
                type:GFLoaderType.circle
            ),
          );
        }else {
          return Center(
            child: GFFloatingWidget(
              child:GFAlert(
                title: 'Veuillez vous connecté pour acceder à votre compte',
                bottombar: Row(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: <Widget>[
                    GFButton(
                      onPressed: (){
                        Navigator.push(context, PageTransition(type: PageTransitionType.fade, child: LoginPage()));
                      },
                      shape: GFButtonShape.pills,
                      icon: Icon(Icons.keyboard_arrow_right, color: Colors.blue,),
                      position: GFPosition.end,
                      text: 'Je me connecte',)
                  ],
                ),
              ),
              horizontalPosition: 4,
              verticalPosition: 150,
            ),
          );
        }
      },
    )
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
