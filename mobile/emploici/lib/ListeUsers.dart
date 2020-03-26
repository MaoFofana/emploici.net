import 'package:emploici/Conversation.dart';
import 'package:emploici/api/api.dart';
import 'package:emploici/main.dart';
import 'package:emploici/model/chatmodel.dart';
import 'package:emploici/model/message.dart';
import 'package:emploici/model/user.dart';
import 'package:emploici/other/ChatItem.dart';
import 'package:emploici/other/utils.dart';
import 'package:flutter/material.dart';
import 'package:emploici/api/api.dart';
import 'package:page_transition/page_transition.dart';

class ListUser extends StatefulWidget {


  @override
  _ListUserState createState() => _ListUserState();
}


class _ListUserState extends State<ListUser> with SingleTickerProviderStateMixin,
    AutomaticKeepAliveClientMixin{
  TabController _tabController;
  Future<ChatModel> futureMessageCountUser;


  @override
  initState(){
    super.initState();
    _tabController = TabController(vsync: this, initialIndex: 0, length: 2);
    futureMessageCountUser = getUsers();
  }


  @override
  Widget build(BuildContext context) {
    super.build(context);
    return Scaffold(
      appBar: AppBar(
//        elevation: 4,
        automaticallyImplyLeading: false,
        title: TextField(
          decoration: InputDecoration.collapsed(
            hintText: 'Search',
          ),
        ),
        actions: <Widget>[],
      ),

      body: new FutureBuilder<ChatModel>(
        future: futureMessageCountUser,
        builder: (context, snapshot) {
          if(snapshot.hasData) {
            if (snapshot.data.user.role == "ADMIN") {
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

                          return ChatItem(
                            dp: chat.user.link,
                            name: chat.user.name,
                            counter: chat.count,
                            msg: chat.dernier,
                            from: chat.user.id,
                            to: 0,
                          );
                        },
                      ),
                    ],
                  )
              );
            } else {
              return Conversation(snapshot.data.user.id, 0, snapshot.data.user.name, snapshot.data.user.link, false);
          }}
          return Center(
              child : CircularProgressIndicator()
          );
        })
    );
  }

  @override
  bool get wantKeepAlive => true;
}

