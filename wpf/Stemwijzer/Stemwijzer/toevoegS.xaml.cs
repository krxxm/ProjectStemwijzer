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
    /// Interaction logic for toevoegS.xaml
    /// </summary>
    public partial class toevoegS : Window
    {
        public toevoegS()
        {
            InitializeComponent();
        }

        private void stoevoegbtn_Click(object sender, RoutedEventArgs e)
        {
            string standpunt = standpunttxt.Text;

            if (string.IsNullOrWhiteSpace(standpunt))
            {
                MessageBox.Show("Vul een standpunt in.");
                return;
            }
            Standpunten nieuwstandpunt = new Standpunten
            {
                text = standpunt
            };

            Databasehandler dbHandler = new Databasehandler();
            dbHandler.OpenConnection();

            bool isCreated = dbHandler.CreateStandpunt(nieuwstandpunt.text);

            if (isCreated)
            {
                MessageBox.Show(" succesvol toegevoegd.");
            }
            else
            {
                MessageBox.Show("Er is een fout opgetreden bij het toevoegen.");
            }

            dbHandler.CloseConnection();
            this.Close();
        }
    }
}
