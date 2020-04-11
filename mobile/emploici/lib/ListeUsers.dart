import 'package:cross_local_storage/cross_local_storage.dart';
import 'package:emploici/Constante.dart';
import 'package:emploici/Conversation.dart';
import 'package:emploici/LoginPage.dart';
import 'package:emploici/api/api.dart';
import 'package:emploici/model/chatmodel.dart';
import 'package:emploici/model/message.dart';
import 'package:emploici/other/ChatItem.dart';
import 'package:flutter/material.dart';
import 'package:getflutter/getflutter.dart';
import 'package:page_transition/page_transition.dart';

class ListUser extends StatefulWidget {
  @override
  _ListUserState createState() => _ListUserState();
}


class _ListUserState extends State<ListUser> with SingleTickerProviderStateMixin,
    AutomaticKeepAliveClientMixin{
  TabController _tabController;
  Future<ChatModel> futureMessageCountUser;
  LocalStorageInterface _localStorageInterface;
  @override
  initState(){
    super.initState();
    _tabController = TabController(vsync: this, initialIndex: 0, length: 2);
    futureMessageCountUser = getUsers();
  _tokenVerified();
  }
  _tokenVerified() async {

     _localStorageInterface = await LocalStorage.getInstance();

  }

  @override
  Widget build(BuildContext context) {
    super.build(context);
    return Scaffold(
      appBar: AppBar(
//        elevation: 4,
        automaticallyImplyLeading: false,
        title: Text('Emploici.net'),
        backgroundColor: Colors.blue,
      ),

      body: new FutureBuilder<ChatModel>(
        future: futureMessageCountUser,
        builder: (context, snapshot) {
          if(snapshot.hasData) {
            if(snapshot.data.user != null){
              String role = snapshot.data.user.role;
              if (role == "ADMIN") {
                return Container(
                    child: Stack(
                      children: <Widget>[
                        ListView.separated(
                          padding: EdgeInsets.all(10),
                          separatorBuilder: (BuildContext context, int index) {
                            return Align(
                              alignment: Alignment.centerRight,
                              child: Container(
                                height: 0.5,
                                width: MediaQuery
                                    .of(context)
                                    .size
                                    .width / 1.3,
                                child: Divider(),
                              ),
                            );
                          },
                          itemCount: snapshot.data.messageCountUsers.length,
                          itemBuilder: (BuildContext context, int index) {
                            MessageCountUsers chat = snapshot.data
                                .messageCountUsers[index];
                            if(chat.dernier != null){
                              return ChatItem(
                                dp: chat.user.link,
                                name: chat.user.name,
                                counter: chat.count,
                                msg: chat.dernier,
                                from: chat.user.id,
                                to: 0,
                              );
                            }
                            return null;

                          },
                        ),
                      ],
                    )
                );
              } else {
                return  Conversation(snapshot.data.user.id, 0, snapshot.data.user.name, snapshot.data.user.link, false);

              }
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

          }else {
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
          // By default, show a loading spinner.

        }})
    );
  }

  @override
  bool get wantKeepAlive => true;
}

