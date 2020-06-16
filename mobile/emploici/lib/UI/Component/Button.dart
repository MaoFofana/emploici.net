
import 'package:flutter/material.dart';


class SubmitButton extends StatelessWidget {
  String titre;
  SubmitButton(this.titre);
  @override
  Widget build(BuildContext context) {
    return Container(
      width: MediaQuery.of(context).size.width,
      padding: EdgeInsets.symmetric(vertical: 15),
      alignment: Alignment.center,
      decoration: BoxDecoration(
          borderRadius: BorderRadius.all(Radius.circular(5)),
          boxShadow: <BoxShadow>[
            BoxShadow(
                color: Colors.grey.shade200,
                offset: Offset(2, 4),
                blurRadius: 5,
                spreadRadius: 2)
          ],
          gradient: LinearGradient(
              begin: Alignment.centerLeft,
              end: Alignment.centerRight,
              colors: [Colors.blue, Colors.blue])),
      child: Text(
        this.titre,
        style: TextStyle(fontSize: 20, color: Colors.white),
      ),
    );
  }
}
