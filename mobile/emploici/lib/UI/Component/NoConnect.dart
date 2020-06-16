



import 'package:emploici/UI/Auth/LoginPage.dart';
import 'package:flutter/material.dart';
import 'package:getflutter/getflutter.dart';
import 'package:page_transition/page_transition.dart';

class NoConnect extends StatelessWidget {
  double vertical = 200;
  NoConnect({this.vertical});
  @override
  Widget build(BuildContext context) {

    return GFFloatingWidget(
      child:GFAlert(
        title: 'Veuillez vous connecté pour acceder à votre compte',
        bottombar: Row(
          mainAxisAlignment: MainAxisAlignment.end,
          children: <Widget>[
            GFButton(
              onPressed: (){
                Navigator.push(context, PageTransition(type: PageTransitionType.fade, child: LoginPage()));
              },
              color: Colors.blue,
              boxShadow:   BoxShadow(
                  color: Colors.grey.shade200,
                  offset: Offset(2, 4),
                  blurRadius: 5,
                  spreadRadius: 2),
              shape: GFButtonShape.standard,
              icon: Icon(Icons.keyboard_arrow_right, color: Colors.white,),
              position: GFPosition.end,
              text: 'Je me connecte',)
          ],
        ),
      ),
      horizontalPosition: 4,
      verticalPosition: this.vertical,
    );
  }


}