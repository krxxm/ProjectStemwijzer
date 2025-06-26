using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace Stemwijzer
{
    /// <summary>
    /// Interaction logic for toevoegU.xaml
    /// </summary>
    public partial class toevoegU : Window
    {
        public toevoegU()
        {
            InitializeComponent();
        }

        private void uvoegbtn_Click(object sender, RoutedEventArgs e)
        {
            string naam = naamtxt.Text;
            string wachtwoord = wachtwoordtxt.Password;
            string email = mailText.Text;
            string rol = (adminbox.SelectedItem as ComboBoxItem)?.Content.ToString();
            if (rol == null)
            {
                MessageBox.Show("Selecteer een rol.");
                return;
            }

            if (string.IsNullOrWhiteSpace(naam) || string.IsNullOrWhiteSpace(wachtwoord) || string.IsNullOrWhiteSpace(email))
            {
                MessageBox.Show("Vul alle velden in.");
                return;
            }

            User nieuweUser = new User
            {
                Naam = naam,
                wachtwoord = wachtwoord,
                Email = email,
                Role = rol
            };
            Databasehandler dbHandler = new Databasehandler();
            dbHandler.OpenConnection();

            bool isCreated = dbHandler.CreateUser(nieuweUser.Naam, nieuweUser.Email, nieuweUser.Role);

            if (isCreated)
            {
                MessageBox.Show("Gebruiker succesvol toegevoegd.");
            }
            else
            {
                MessageBox.Show("Er is een fout opgetreden bij het toevoegen van de gebruiker.");
            }
            this.Close();
        }
    }
}
