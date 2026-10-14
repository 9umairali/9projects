import 'package:flutter/material.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:dahimail/core/util.dart';

void main() {
  testWidgets('utility messages stay above navigation and below the action button', (tester) async {
    await tester.pumpWidget(MaterialApp(
      home: Scaffold(
        body: Builder(builder: (context) => TextButton(
          onPressed: () => toast(context, 'Press back again to exit'),
          child: const Text('Show utility'),
        )),
        floatingActionButton: FloatingActionButton(
          onPressed: () {},
          child: const Icon(Icons.edit),
        ),
        bottomNavigationBar: NavigationBar(destinations: const [
          NavigationDestination(icon: Icon(Icons.chat), label: 'Chat'),
          NavigationDestination(icon: Icon(Icons.mail), label: 'Mail'),
        ]),
      ),
    ));
    await tester.tap(find.text('Show utility'));
    await tester.pumpAndSettle();
    final snack = tester.getRect(find.byType(SnackBar));
    final nav = tester.getRect(find.byType(NavigationBar));
    final fab = tester.getRect(find.byType(FloatingActionButton));
    expect(snack.bottom, closeTo(nav.top, 1));
    expect(snack.top, greaterThanOrEqualTo(fab.bottom));
  });
}
