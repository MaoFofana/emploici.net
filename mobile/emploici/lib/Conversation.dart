import 'dart:async';
import 'dart:math';
import 'package:emploici/api/api.dart';
import 'package:emploici/model/message.dart';
import 'package:emploici/other/ChatBubble.dart';
import 'package:emploici/other/utils.dart';
import 'package:flutter/material.dart';
import 'main.dart';




class Conversation extends StatefulWidget {
 final int from;
 final int to ;
 final String name;
 final String image;
 final bool admin;
  Conversation(this.from ,this.to , this.name, this.image, this.admin);
  @override
  _ConversationState createState() => _ConversationState(from, to , name, image , this.admin);
}

class _ConversationState extends State<Conversation> {

  final int from;
  final int to;
  final String  name ;
  final String image;
  final bool admin;
  Future<List> futureMessage;
  TextEditingController _message = new TextEditingController();
  _ConversationState(this.from, this.to,this.name, this.image, this.admin);
  Timer _timer;
  @override
  void initState() {
    super.initState();
    futureMessage = getMessages(from);
    _timer = Timer.periodic(Duration(seconds: 1), (Timer t) => updateIPI());
  }

  updateIPI(){
    setState(() {
      futureMessage = getMessages(from);
    });
  }
/*
  sendMessage(String message, int to, int from) async {
    var futur = await sendMessage( message,to, from);
  }*/
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
          onPressed: ()=>Navigator.pop(context),
        ),
        titleSpacing: 0,
        title: InkWell(
          child: Row(

            children: <Widget>[
              Padding(
                padding: EdgeInsets.only(left: 0.0, right: 10.0),
                child: CircleAvatar(
                  backgroundImage: NetworkImage(
                      SERVER_BASE_IP + "/storage/"+ image,
                  ),
                ),
              ),

              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    SizedBox(height: 15.0),
                    Text(
                      name,
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

          onTap: (){},
        ),
      ),


      body: new FutureBuilder<List>(
        future: futureMessage,
        builder: (context, snapshot) {
          if(snapshot.hasData){
            return  Container(
              height: MediaQuery.of(context).size.height,
              child: Column(
                children: <Widget>[
                  SizedBox(height: 10),
                  Flexible(
                    child: ListView.builder(
                      padding: EdgeInsets.symmetric(horizontal: 10),
                      itemCount: snapshot.data.length,
                      reverse: true,
                      itemBuilder: (BuildContext context, int index) {
                        Map<String, dynamic> json = snapshot.data[index];
                        return ChatBubble(
                            message : json['message'],
                          time : "",
                        isMe : (admin? ((json['from'] as int == to)? true : false) : ((json['from'] as int == from)? true : false)),
                        username : name,
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
                                  if(admin){
                                    sendMessage(_message.text,from, 0);
                                  }else{
                                  sendMessage(_message.text,to, from);
                                  }

                                  _message.clear();
                                  setState(() {
                                    getMessages(from);
                                  });
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
            );
          }

          return Center(
             child : CircularProgressIndicator()
          );
        },
      )



    );
  }
}
