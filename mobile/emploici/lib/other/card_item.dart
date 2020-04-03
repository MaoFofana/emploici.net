
import 'package:emploici/DetailEmploi.dart';
import 'package:emploici/HomePage.dart';
import 'package:emploici/model/job.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:getflutter/getflutter.dart';
import 'package:page_transition/page_transition.dart';

import '../main.dart';

class CardItem extends StatefulWidget {


  final Job job;
 CardItem({@required this.job});

  @override
  _CardItemState createState() => _CardItemState();
}

class _CardItemState extends State<CardItem> {

  @override
  Widget build(BuildContext context) {
    return   GFCard(
      boxFit: BoxFit.cover,
      image:  Image.network(widget.job.user.link),
      content:Text(widget.job.titre),
      buttonBar: GFButtonBar(
        alignment: WrapAlignment.start,
        children: <Widget>[
          GFButton(
            color: Colors.blue,
            onPressed: () {
              Navigator.push(
                  context,
                  MaterialPageRoute(
                    builder: (context) => DetailEmploi(widget.job.id),
                    // Pass the arguments as part of the RouteSettings. The
                    // DetailScreen reads the arguments from these settings.

                  ));
            },
            text: 'Plus de details',
          ),
        ],
      ),
    );
  }

  Widget myDetailsContainer1(String title, String lieu, int id) {
    return Column(
      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      children: <Widget>[
        Container(

            width: MediaQuery.of(context).size.width*0.8,
              margin: EdgeInsets.fromLTRB(0,0, 7, 0),
                child: Text(
                  title,
                  textAlign: TextAlign.center,
                  style: TextStyle(color: Colors.black, fontSize: 24.0,fontWeight: FontWeight.bold),
                )
        ),
        Container(
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: <Widget>[
                  Container(child: Icon(
                    Icons.add_location, color: Colors.black,
                    size: 30.0,),),
                  Container(
                      child: Text(lieu,

                      style: TextStyle(color: Colors.black, fontSize: 30.0,
                      ),
                      )
                  ),
                ],)),
        Container(
            child: GFButton(
              onPressed: (){
                Navigator.push(
                    context,
                    MaterialPageRoute(
                    builder: (context) => DetailEmploi(id),
                // Pass the arguments as part of the RouteSettings. The
                // DetailScreen reads the arguments from these settings.
                settings: RouteSettings(
                arguments: widget.job,
                ),
                ));
              },
              fullWidthButton: true,
              size: 60,
              shape: GFButtonShape.pills,
              color: Colors.blue,
              icon: Icon(Icons.keyboard_arrow_right, color: Colors.white,),
              position: GFPosition.end,
              text: 'Voir',textStyle: TextStyle(fontSize: 30.0, color: Colors.white),)

        ),
      ],
    );
  }


}