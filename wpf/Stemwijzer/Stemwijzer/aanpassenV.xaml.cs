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
    /// Interaction logic for aanpassenV.xaml
    /// </summary>
    public partial class aanpassenV : Window
    {
        public aanpassenV()
        {
            InitializeComponent();
        }
        private Verkiezingen geselecteerdeVerkiezingen;

        public aanpassenV(Verkiezingen verkiezing)
        {
            InitializeComponent();
            geselecteerdeVerkiezingen = verkiezing;

            titeltxt.Text = geselecteerdeVerkiezingen.title;
            omschrijvingtxt.Text = geselecteerdeVerkiezingen.discription;

           
        }

        private void Vaanpassen_Click(object sender, RoutedEventArgs e)
        {
            string nieuweTitel = titeltxt.Text;
            string nieuweOmschrijving = omschrijvingtxt.Text;
           

            geselecteerdeVerkiezingen.title = nieuweTitel;
            geselecteerdeVerkiezingen.discription = nieuweOmschrijving;

            Databasehandler db = new Databasehandler();
            bool isAangepast = db.UpdateVerkiezingen(geselecteerdeVerkiezingen);

            if (isAangepast)
            {
                MessageBox.Show("Verkiezingen succesvol aangepast.");
                this.Close();
            }
            else
            {
                MessageBox.Show("Er is iets fout gegaan bij het opslaan.");
            }
        }
        

        
     }
}
