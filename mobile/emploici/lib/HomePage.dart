import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'package:emploici/ListeUsers.dart';
import 'package:emploici/Conversation.dart';
import 'package:emploici/Profile.dart';
import 'package:emploici/api/api.dart';
import 'package:flutter/material.dart';
import 'package:page_transition/page_transition.dart';

class HomePage extends StatefulWidget {
  @override
  _BottomNavBarState createState() => _BottomNavBarState();
}


class _BottomNavBarState extends State<HomePage> {

  int _page = 0;
  GlobalKey _bottomNavigationKey = GlobalKey();
  final ListUser _users = new ListUser();
  final Profile _profile = new Profile();

  Widget _showPage = new Profile();
  // ignore: missing_return
  Widget _showPageChooser(int page) {

    switch(page){
      case 0 :
        return _profile;
        break;
      case 1:
        return _users;
        break;
    }
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      bottomNavigationBar: CurvedNavigationBar(
        key: _bottomNavigationKey,
        backgroundColor: Colors.white,
        color: Color.fromRGBO(3,124,232, 1),
        index: _page,
        items: <Widget>[
          Icon(Icons.person, size: 30, color: Colors.white),
          Icon(Icons.message, size: 30,color: Colors.white),
        ],
        animationCurve: Curves.easeInOut,
        animationDuration: Duration(milliseconds: 600),
        onTap: (int tappedIndex) {
          setState(()  {
            _showPage = _showPageChooser(tappedIndex) ;
          });
        },
      ),
    body: Container(
        color: Colors.white,
        child: Center(
          child: _showPage
        ),
    )
    );
  }

}