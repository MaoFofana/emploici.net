
import 'package:emploici/model/message.dart';
import 'package:emploici/model/user.dart';

class ChatModel {
  final User user;
  final List<MessageCountUsers> messageCountUsers;

  ChatModel(this.user, this.messageCountUsers);


}