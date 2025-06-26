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
    /// Interaction logic for aanpassenP.xaml
    /// </summary>
    public partial class aanpassenP : Window
    {
        public aanpassenP()
        {
            InitializeComponent();
        }
        private Partij geselecteerdePartij;

        public aanpassenP(Partij partij)
        {
            InitializeComponent();
            geselecteerdePartij = partij;

            
            naamtxt.Text = geselecteerdePartij.Naam;
            
        }

        private void paanpassenbtn_Click(object sender, RoutedEventArgs e)
        {
            string nieuweNaam = naamtxt.Text;
          

            geselecteerdePartij.Naam = nieuweNaam;
         

            Databasehandler db = new Databasehandler();
            bool isAangepast = db.UpdatePartij(geselecteerdePartij);


            if (isAangepast)
            {
                MessageBox.Show("Partij succesvol aangepast.");
                this.Close();
            }
            else
            {
                MessageBox.Show("Er is iets fout gegaan bij het opslaan.");
            }
        }

        private void naamtxt_TextChanged(object sender, TextChangedEventArgs e)
        {

        }
    }
}
