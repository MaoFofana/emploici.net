import 'package:emploici/Data/GlobalVariable.dart';
import 'package:emploici/Data/Api/Auth.dart';
import 'package:emploici/Data/Model/Chat.dart';
import 'package:emploici/Data/Model/Message.dart';
import 'package:emploici/UI/Component/NoConnect.dart';
import 'package:emploici/UI/Component/ChatItem.dart';
import 'package:flutter/material.dart';
import 'package:getflutter/getflutter.dart';
import 'package:localstorage/localstorage.dart';
import 'package:page_transition/page_transition.dart';

class ListUser extends StatefulWidget {
  @override
  _ListUserState createState() => _ListUserState();
}
class _ListUserState extends State<ListUser> with SingleTickerProviderStateMixin,
    AutomaticKeepAliveClientMixin{
  TabController _tabController;
  Future<ChatModel> futureMessageCountUser;
  LocalStorage storage  = new LocalStorage("data");
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
                                MessageCountUsers chat = snapshot.data.messageCountUsers[index];
                                print(chat.count == 3);

                                  if(chat.dernier != null){
                                    return ChatItem(
                                      dp: SERVER_BASE_IP + "/storage/"+  chat.user.link,
                                      name: chat.user.name,
                                      counter: chat.count,
                                      msg: chat.dernier,
                                      me: snapshot.data.user.id,
                                      to: chat.user.id,
                                      admin: true,
                                    );
                                  } {
                                  return ChatItem(
                                    dp: SERVER_BASE_IP + "/storage/"+  chat.user.link,
                                    name: chat.user.name,
                                    counter: chat.count,
                                    msg: "Aucun",
                                    me: snapshot.data.user.id,
                                    to: chat.user.id,
                                    admin: true,
                                  );
                                }
                              },
                            ),
                          ],
                        )
                    );
                  } else {
                    print(snapshot.data.user.id);
                    return Container(child :
                    ChatItem(
                      dp: "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRomZ9qK1_JpcdH08UBu5O2SdRRX7py-jg2_t9ibxhlikJGbn87&usqp=CAU",
                     name: "Service client",
                      counter: 0,
                      msg: "Echanger avec le service client",
                      me: snapshot.data.user.id,
                      to: 0,
                      admin: false,
                    ));
                  }
                }else {
                  return Center(
                    child: NoConnect(vertical: 200,)
                  );
                }
              }else {
                var token = storage.getItem(tokenName);
                if(token != null){
                  return Center(
                    child: GFLoader(
                        type:GFLoaderType.circle
                    ),
                  );
                }else {
                  return Center(
                    child: NoConnect(vertical: 200,)
                  );
                }
                // By default, show a loading spinner.

              }})
    );
  }

  @override
  bool get wantKeepAlive => true;
}

