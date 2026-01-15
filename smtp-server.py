#!/usr/bin/env python3
import asyncio
import aiosmtpd.controller

emails = []

class EmailHandler:
    async def handle_RCPT(self, server, session, envelope, address, rcpt_options):
        envelope.rcpt_tos.append(address)
        return '250 OK'

    async def handle_DATA(self, server, session, envelope):
        emails.append({
            'from': envelope.mail_from,
            'to': envelope.rcpt_tos,
            'content': envelope.content.decode()
        })
        print(f'=== Email #{len(emails)} Received ===')
        print(f'From: {envelope.mail_from}')
        print(f'To: {envelope.rcpt_tos}')
        print('=' * 30)
        return '250 Message accepted for delivery'

async def main():
    handler = EmailHandler()
    controller = aiosmtpd.controller.Controller(handler, hostname='127.0.0.1', port=1025)
    controller.start()
    print('SMTP server running on 127.0.0.1:1025')
    print('Press Ctrl+C to stop')
    while True:
        await asyncio.sleep(3600)

if __name__ == '__main__':
    try:
        asyncio.run(main())
    except KeyboardInterrupt:
        print('\nServer stopped')

