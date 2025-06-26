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
    /// Interaction logic for aanpassenG.xaml
    /// </summary>
    public partial class aanpassenG : Window
    {
        public aanpassenG()
        {
            InitializeComponent();
        }
        private User geselecteerdeUser;

        public aanpassenG(User user)
        {
            InitializeComponent();
            geselecteerdeUser = user;

            // Stel TextBoxen in met data van de user
            naamtxt.Text = geselecteerdeUser.Naam;
        
            string rol = geselecteerdeUser.Role;

            // Bijvoorbeeld voor een ComboBox met rollen (Admin/User/Visitor)
            foreach (ComboBoxItem item in adminbox.Items)
            {
                if (item.Content.ToString().ToLower() == geselecteerdeUser.Role.ToLower())
                {
                    adminbox.SelectedItem = item;
                    break;
                }
            }

        }

        private void Uveranderbtn_Click(object sender, RoutedEventArgs e)
        {
            string nieuweNaam = naamtxt.Text;
            string nieuweRol = (adminbox.SelectedItem as ComboBoxItem)?.Content.ToString();

            geselecteerdeUser.Naam = nieuweNaam;
            geselecteerdeUser.Role = nieuweRol;

            Databasehandler db = new Databasehandler();
            bool isAangepast = db.UpdateUser(geselecteerdeUser);

            if (isAangepast)
            {
                MessageBox.Show("Gebruiker succesvol aangepast.");
                this.Close();
            }
            else
            {
                MessageBox.Show("Er is iets fout gegaan bij het opslaan.");
            }
        }
        private void naamtxt_TextChanged(object sender, TextChangedEventArgs e)
        {
            // Eventueel logica toevoegen
        }

        private void adminbox_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {

        }
    }
}
