
import 'package:emploici/Conversation.dart';
import 'package:emploici/api/api.dart';
import 'package:emploici/main.dart';
import 'package:emploici/model/user.dart';
import 'package:flutter/material.dart';

class ChatItem extends StatefulWidget {
  final int to;
  final String dp;
  final String name;
  //final String time;
  final String msg;
  // final bool isOnline;
  final int from ;
  final int counter;

  ChatItem({
    Key key,
    @required this.to,
    @required this.dp,
    @required this.name,
    // @required this.time,
    @required this.msg,
    @required this.counter,
    @required this.from
  }) : super(key: key);

  @override
  _ChatItemState createState() => _ChatItemState();
}

class _ChatItemState extends State<ChatItem> {


  Future<User> futureUser;

  @override
  void initState() {
    super.initState();
    futureUser = getMe();
    //if(user.role == "ADMIN") Navigator.push(context, PageTransition(type: PageTransitionType.fade, child: Conversation(user.id, 0, user.name, user.link, false)));

  }
  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 8.0),
      child: ListTile(
            contentPadding: EdgeInsets.all(0),
            leading: Stack(
              children: <Widget>[
                CircleAvatar(
                  backgroundImage: NetworkImage (
                    SERVER_BASE_IP + "/storage/"+ widget.dp,
                  ),
                  radius: 25,
                ),
              ],
            ),

            title: Text(
              "${widget.name}",
              style: TextStyle(
                fontWeight: FontWeight.bold,
              ),
            ),
            subtitle: Text("${widget.msg}"),
            trailing: Column(
              crossAxisAlignment: CrossAxisAlignment.end,
              children: <Widget>[
                widget.counter == 0
                    ?SizedBox()
                    :Container(
                  margin:  EdgeInsets.only(top: 17),
                  padding: EdgeInsets.all(1),
                  decoration: BoxDecoration(
                    color: Colors.red,
                    borderRadius: BorderRadius.circular(6),
                  ),
                  constraints: BoxConstraints(
                    minWidth: 11,
                    minHeight: 11,
                  ),
                  child:  Padding(
                    padding: EdgeInsets.only(top: 1, left: 5, right: 5),
                    child:Text(
                      "${widget.counter}",
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 10,
                      ),
                      textAlign: TextAlign.center,
                    ),
                  ),
                ),
              ],
            ),
            onTap: () async {
                var lu = await desableLu(widget.from);
              Navigator.of(context, rootNavigator: true).push(
                MaterialPageRoute(
                  builder: (BuildContext context){

                    return Conversation(widget.from,widget.to, widget.name, widget.dp,true);
                  },
                ),
              );
            },
          ));
  }
}
