import 'dart:async';
import 'dart:convert';
import 'dart:developer';
import 'package:emploici/Data/Api/Message.dart';
import 'package:emploici/Data/GlobalVariable.dart';
import 'package:emploici/Data/Model/Message.dart';
import 'package:emploici/HomePage.dart';
import 'package:emploici/UI/Component/ChatBubble.dart';
import 'package:flutter/material.dart';
import 'package:localstorage/localstorage.dart';
import 'package:page_transition/page_transition.dart';
import 'package:http/http.dart' as http;




class Conversation extends StatefulWidget {
 final int to ;
 final String name;
 final String image;
 final bool admin;
 final int me ;
  Conversation({this.to , this.name, this.image, this.admin, this.me});
  @override
  _ConversationState createState() => _ConversationState();
}

class _ConversationState extends State<Conversation> {
  List<Message> messages = new List();
  TextEditingController _message = new TextEditingController();
  Timer _timer;
  @override
  void initState() {
    super.initState();
    getMessages(widget.admin ?widget.to : widget.me);
    _timer = Timer.periodic(Duration(seconds: 7), (Timer t) => getMessages(widget.admin ?widget.to : widget.me));
  }
  Future<Null> getMessages(int id) async {
    LocalStorage storage = new LocalStorage("data");
    var token = storage.getItem("token");
    final response = await http.get(
      "$SERVER_IP/listmessage/$id",
      headers: {'Authorization': 'Bearer $token', 'Content-type': 'application/json',
        'Accept': 'application/json'},
    );
    var  mapJson = jsonDecode(response.body) as List;
    List<Message> messagesList = mapJson.map((e) => new  Message.fromJson(e)).toList();
    log(mapJson.toString());
      setState(() {
        messages.clear();
        messages = new List.from(messagesList.reversed) ;//mapJson.map((e) => Message.fromJson(e)).toList();
      });

  }


  @override
  void dispose() {
    _timer?.cancel();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: IconButton(
          icon: Icon(
            Icons.keyboard_backspace,
          ),
          onPressed: (){
            Navigator.push(context, PageTransition(type: PageTransitionType.fade, child: HomePage(index : 1)));
          },
        ),
        titleSpacing: 0,
        title: InkWell(
          child: Row(
            children: <Widget>[
              Padding(
                padding: EdgeInsets.only(left: 0.0, right: 10.0),
                child: CircleAvatar(
                  backgroundImage: NetworkImage(
                      widget.image,
                  ),
                ),
              ),
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    SizedBox(height: 15.0),
                    Text(
                      widget.name,
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                        fontSize: 14,
                      ),
                    ),
                    SizedBox(height: 5),
                    Text(
                      "",
                      style: TextStyle(
                        fontWeight: FontWeight.w400,
                        fontSize: 11,
                      ),
                    ),
                  ],
                ),
              ),
            ],
          ),
          onTap: (){

          },
        ),
      ),
      body:  Container(
        height: MediaQuery.of(context).size.height,
        child: Column(
          children: <Widget>[
            SizedBox(height: 10),
            Flexible(
              child: ListView.builder(
                padding: EdgeInsets.symmetric(horizontal: 10),
                itemCount: messages.length,
                reverse: true,
                itemBuilder: (BuildContext context, int index) {
                  Message _message = messages[index];
                  return ChatBubble(
                      message : _message.message,
                      time : "",
                      isMe :  (_message.from  != widget.to),//(widget.admin? ((_message.from  == widget.to)? true : false) : ((_message.from   == widget.from)? true : false)),
                      username : widget.name,
                      type: "text",
                      replyText : '',
                      isReply : false,
                      replyName: ''
                  );
                },
              ),
            ),

            Align(
              alignment: Alignment.bottomCenter,
              child: Container(
//                height: 140,
                decoration: BoxDecoration(
                  color: Theme.of(context).primaryColor,
                  boxShadow: [
                    BoxShadow(
                      color: Colors.grey[500],
                      offset: Offset(0.0, 1.5),
                      blurRadius: 4.0,
                    ),
                  ],
                ),
                constraints: BoxConstraints(
                  maxHeight: 190,
                ),
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  children: <Widget>[
                    Flexible(
                      child: ListTile(
                        leading: IconButton(
                          icon: Icon(
                            Icons.add,
                            color: Theme.of(context).accentColor,
                          ),
                          onPressed: (){},
                        ),

                        contentPadding: EdgeInsets.all(0),
                        title: TextField(
                          controller: _message,
                          style: TextStyle(
                            fontSize: 15.0,
                            color: Colors.white,
                          ),
                          decoration: InputDecoration(
                            contentPadding: EdgeInsets.all(10.0),
                            border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(5.0),
                              borderSide: BorderSide(color: Theme.of(context).primaryColor,),
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Theme.of(context).primaryColor,),
                              borderRadius: BorderRadius.circular(5.0),
                            ),
                            hintText: "Votre message...",
                            hintStyle: TextStyle(
                              fontSize: 15.0,
                              color: Colors.white,
                            ),
                          ),
                          maxLines: null,
                        ),


                        trailing: IconButton(
                          icon: Icon(
                            Icons.send,
                            color: Colors.white,
                          ),
                          onPressed: () {
                            print(widget.to.toString() + " me" + widget.me.toString());
                            setState(() {
                              sendMessage(_message.text,widget.to, widget.admin ? 0 : widget.me);
                              getMessages(widget.admin ? widget.to : widget.me);
                            });
                            _message.clear();
                          },
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      )
    );
  }
}
