import 'package:emploici/Data/Api/Auth.dart';
import 'package:emploici/Data/GlobalVariable.dart';
import 'package:emploici/HomePage.dart';
import 'package:emploici/UI/Component/Button.dart';
import 'package:flutter/material.dart';
import 'package:page_transition/page_transition.dart';
import 'package:url_launcher/url_launcher.dart';


class LoginPage extends StatefulWidget {
  LoginPage({Key key}) : super(key: key);
  @override
  _LoginPageState createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();

  Widget _entryField(String title,TextEditingController _controller, {bool isPassword = false}) {
    return Container(
      margin: EdgeInsets.symmetric(vertical: 10),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: <Widget>[
          Text(
            title,
            style: TextStyle(fontWeight: FontWeight.bold, fontSize: 15),
          ),
          SizedBox(
            height: 10,
          ),
          TextField(
              obscureText: isPassword,
              controller: _controller,
              decoration: InputDecoration(
                  border: InputBorder.none,
                  fillColor: Color(0xfff3f3f4),
                  filled: true))
        ],
      ),
    );
  }


  Widget _createAccountLabel() {
    return Container(
      margin: EdgeInsets.symmetric(vertical: 20),
      alignment: Alignment.bottomCenter,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          Text(
            "Vous n'avez pas de compte?",
            style: TextStyle(fontSize: 13, fontWeight: FontWeight.w600),
          ),
          SizedBox(
            width: 10,
          ),
          InkWell(
            onTap: () {
              launch('$SERVER_BASE_IP/register');
            },
            child: Text(
              'Inscrivez-vous',
              style: TextStyle(
                  color: Colors.blue,
                  fontSize: 13,
                  fontWeight: FontWeight.w600),
            ),
          )
        ],
      ),
    );
  }

  Widget _title() {
    return RichText(
      textAlign: TextAlign.center,
      text: TextSpan(
          text: 'Emploici.net',
          style: TextStyle(
            fontSize: 30,
            fontWeight: FontWeight.w700,
            color: Colors.green,
          )),
    );
  }

  Widget _emailPasswordWidget() {
    return Column(
      children: <Widget>[
        _entryField("Email", _emailController),
        _entryField("Mot de passe",_passwordController, isPassword: true),
      ],
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text("Connexion"),
        ),
        body:  Container(
          child: Stack(
            children: <Widget>[
              Container(
                padding: EdgeInsets.symmetric(horizontal: 20, vertical: 10),
                child: Column(
                  children: <Widget>[
                    Expanded(
                      flex: 1,
                      child: SizedBox(height: 3,),
                    ),
                    _title(),
                    SizedBox(height: 30,),
                    _emailPasswordWidget(),
                    SizedBox(height: 20,),
                    InkWell(
                      child: SubmitButton("Connexion"),
                      onTap: () async {
                        var email = _emailController.text;
                        var password = _passwordController.text;
                        var user = await attemptLogIn(email, password);
                        if(user != null) {
                          Navigator.push(
                              context,
                              PageTransition(type: PageTransitionType.fade, child: HomePage()));
                        } else {

                          displayDialog(context, "Une erreur est apparu",
                              "Veuillez saisir les identifiants exacts");
                        }
                      },
                    ),

                    Align(
                      alignment: Alignment.bottomCenter,
                      child: _createAccountLabel(),
                    ),
                    Expanded(
                      flex: 2,
                      child: SizedBox(),
                    ),
                  ],
                ),
              ),



            ],
          ),
        )

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
}