import 'package:emploici/HomePage.dart';
import 'package:emploici/api/api.dart';
import 'package:emploici/Animations/FadeAnimation.dart';
import 'package:flutter/material.dart';
import 'package:getflutter/components/button/gf_button.dart';
import 'package:getflutter/getflutter.dart';
import 'package:page_transition/page_transition.dart';

class LoginPage extends StatelessWidget {
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return new  Scaffold(
      backgroundColor: Color.fromRGBO(10,69, 122, 1),
      body: Container(
        decoration: BoxDecoration(
          image: DecorationImage(
            image: AssetImage("assets/images/banner.png"),
            fit: BoxFit.cover,
          ),
        ),
        padding: EdgeInsets.all(30),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Positioned(
                bottom: 14,
                right: 20,
                left: 0,
                child: FadeAnimation(1.6, Container(
                  width:170,
                  height: 180,
                  decoration: BoxDecoration(
                      image: DecorationImage(
                          image: AssetImage('assets/images/illustration.png'),
                          fit: BoxFit.cover
                      )
                  ),
                ))),
            FadeAnimation(1.2, Text("Connection",
              style: TextStyle(color: Colors.white, fontSize: 40, fontWeight: FontWeight.bold),)),
            SizedBox(height: 30,),
            FadeAnimation(1.5, Container(
              padding: EdgeInsets.all(10),
              decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(10),
                  color: Colors.white
              ),
              child: Column(
                children: <Widget>[
                  Container(
                    decoration: BoxDecoration(
                        border: Border(bottom: BorderSide(color: Colors.grey[300]))
                    ),
                    child: TextField(
                      controller: _emailController,
                      decoration: InputDecoration(
                          border: InputBorder.none,
                          hintStyle: TextStyle(color: Colors.grey.withOpacity(.8)),
                          hintText: "Email"
                      ),
                    ),
                  ),
                  Container(
                    decoration: BoxDecoration(
                        border: Border(bottom: BorderSide(color: Colors.grey[300]))
                    ),
                    child: TextField(
                      obscureText: true,
                      controller: _passwordController,
                      decoration: InputDecoration(
                          border: InputBorder.none,
                          hintStyle: TextStyle(color: Colors.grey.withOpacity(.8)),
                          hintText: "Mot de passe"
                      ),
                    ),
                  ),
                ],
              ),
            )),
            SizedBox(height: 40,),
            FadeAnimation(1.8, Center(
              child: Container(
                width: 120,

                child: Center(
                  child:
                  GFButton(
                    onPressed: ()async {
                      var email = _emailController.text;
                      var password = _passwordController.text;
                      var user = await attemptLogIn(email, password);
                      if(user != null) {
                        Navigator.push(
                            context,
                            PageTransition(type: PageTransitionType.fade, child: HomePage()));
                      } else {
                        displayDialog(context, "Une erreur est apparu",
                            "Veuillez réssayez ");
                      }
                    },
                    text: "Connexion",
                    size: GFSize.LARGE,
                    blockButton: true,
                    shape: GFButtonShape.standard,
                    elevation: 0.6,
                    color: Colors.green,
                  ),
                ),
              ),
            )),
          ],
        ),
      ),
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
