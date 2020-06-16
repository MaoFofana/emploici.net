import 'package:emploici/Data/Model/Job.dart';
import 'package:emploici/UI/Job/DetailJob.dart';
import 'package:flutter/material.dart';


/// ItemGrid class

class ProductGrid extends StatelessWidget {
  Job item;
  ProductGrid(this.item);
  @override
  Widget build(BuildContext context) {
    MediaQueryData mediaQueryData = MediaQuery.of(context);
    String traitement = item.datelimite.replaceAll("-", "/").substring(0, item.datelimite.indexOf('T'));
    return InkWell(
        onTap: () {
          Navigator.of(context).push(PageRouteBuilder(
              pageBuilder: (_, __, ___) => DetailEmploi(item.id),
              transitionDuration: Duration(milliseconds: 900),

              /// Set animation Opacity in route to detailProduk layout
              transitionsBuilder:
                  (_, Animation<double> animation, __, Widget child) {
                return Opacity(
                  opacity: animation.value,
                  child: child,
                );
              }));
        },
        child: Container(
          decoration: BoxDecoration(
              color: Colors.white,
              borderRadius: BorderRadius.all(Radius.circular(5.0)),
              boxShadow: [
                BoxShadow(
                  color: Color(0xFF656565).withOpacity(0.15),
                  blurRadius: 2.0,
                  spreadRadius: 1.0,
//           offset: Offset(4.0, 10.0)
                )
              ]),
          child: Wrap(
            children: <Widget>[
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.spaceAround,
                mainAxisSize: MainAxisSize.min,
                children: <Widget>[
                  Stack(
                    children: <Widget>[
                      Container(
                        height: mediaQueryData.size.height / 5,
                        width: 160.0,
                        decoration: BoxDecoration(
                            borderRadius: BorderRadius.only(
                                topLeft: Radius.circular(7.0),
                                topRight: Radius.circular(7.0)),

                            image: DecorationImage(
                                image: new NetworkImage(item.user.link), fit: BoxFit.cover)),
                      ),
                    ],
                  ),
                  Padding(padding: EdgeInsets.only(top: 7.0)),
                  Padding(
                    padding: const EdgeInsets.only(left: 15.0, right: 15.0),
                    child:  Container(
                        height: 90,
                      child:   Center(
                        child: Text(
                          item.titre,
                          overflow: TextOverflow.clip,
                          textAlign: TextAlign.center,
                          style: TextStyle(
                              letterSpacing: 0.5,
                              color: Colors.black,
                              fontFamily: "Sans",
                              fontWeight: FontWeight.w500,
                              fontSize: 15.0),
                        ),
                      )
                    )
                  ),
                  Padding(padding: EdgeInsets.only(top: 1.0)),
                  Padding(
                    padding:
                    const EdgeInsets.only(left: 15.0, right: 15.0, top: 5.0),
                    child: Row(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: <Widget>[
                        Row(
                          children: <Widget>[
                            Icon(Icons.place,),
                            Text(
                              item.lieu ,
                              style: TextStyle(
                                  fontFamily: "Sans",
                                  color: Colors.black,
                                  fontWeight: FontWeight.bold,
                                  fontSize: 14.0),
                            ),
                          ],
                        ),
                      ],
                    ),
                  ),
                  Padding(
                    padding:
                    const EdgeInsets.only(left: 15.0, right: 15.0, top: 5.0),
                    child: Row(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: <Widget>[
                        Row(
                          children: <Widget>[
                            Icon(Icons.timer),
                            Text(
                                traitement.split('/')[2] + "/" + traitement.split('/')[1] + "/" + traitement.split('/')[0] ,
                              style: TextStyle(
                                  fontFamily: "Sans",
                                  color: Colors.black,
                                  fontWeight: FontWeight.w500,
                                  fontSize: 14.0),
                            ),
                          ],
                        ),
                      ],
                    ),
                  ),

                ],
              ),
            ],
          ),
        )

    );
  }
}