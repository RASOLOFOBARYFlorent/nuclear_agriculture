const nodemailer = require('nodemailer');

// Configuration du transporteur (SMTP pour un serveur local)
const transporter = nodemailer.createTransport({
  host: 'localhost',
  port: 25,
  secure: false, // true for 465, false for other ports
});

// Définir les informations de l'e-mail
const mailOptions = {
  from: 'expediteur@example.com',
  to: 'destinataire@example.com',
  subject: 'Sujet de l\'e-mail',
  text: 'Corps de l\'e-mail',
};

// Envoyer l'e-mail
transporter.sendMail(mailOptions, (error, info) => {
  if (error) {
    return console.log(error);
  }
  console.log('Message sent: %s', info.messageId);
});
