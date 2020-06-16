import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'package:emploici/UI/Job/ListJob.dart';
import 'package:emploici/UI/Chat/ListeUsers.dart';
import 'package:emploici/UI/Auth/Profile.dart';
import 'package:flutter/material.dart';

class HomePage extends StatefulWidget {
  final int index;

  const HomePage({Key key,  this.index = 0}) : super(key: key);
  @override
  _BottomNavBarState createState() => _BottomNavBarState();
}


class _BottomNavBarState extends State<HomePage> {

  int _page = 0;
  GlobalKey _bottomNavigationKey = GlobalKey();
  final ListUser _users = new ListUser();
  final Profile _profile = new Profile();
  final ListEmploi _listEmploi = new ListEmploi();

  Widget _showPage = new ListEmploi();

  @override
  initState(){
    super.initState();
    setState(() {
      _page = widget.index;
     _showPage =  _showPageChooser(widget.index);
    });
  }
  // ignore: missing_return
  Widget _showPageChooser(int page) {

    switch(page){
      case  0 :
        return _listEmploi;
        break;
      case 1:
        return _users;
        break;
      case 2:
        return _profile;
        break;

    }
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      bottomNavigationBar: CurvedNavigationBar(
        key: _bottomNavigationKey,
        backgroundColor: Colors.white,
        color: Colors.blue,
        index: _page,
        items: <Widget>[
          Icon(Icons.business_center, size: 25, color: Colors.white),
          Icon(Icons.message, size: 25,color: Colors.white),
          Icon(Icons.person, size: 25, color: Colors.white),
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