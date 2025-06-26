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
    /// Interaction logic for aanpassenN.xaml
    /// </summary>
    public partial class aanpassenN : Window
    {
        public aanpassenN()
        {
            InitializeComponent();
        }
        private Nieuws geselecteerdeNieuws;

        public aanpassenN(Nieuws nieuw)
        {
            InitializeComponent();
            geselecteerdeNieuws = nieuw;

            titeltxt.Text = geselecteerdeNieuws.Title;
        }

        private void aanpassenNbtn_Click(object sender, RoutedEventArgs e)
        {
            string nieuwetitel = titeltxt.Text;

            geselecteerdeNieuws.Title = nieuwetitel;

            Databasehandler db = new Databasehandler();
            bool isAangepast = db.UpdateNieuws(geselecteerdeNieuws);
            if (isAangepast)
            {
                MessageBox.Show("Nieuws succesvol aangepast.");
                this.Close();
            }
            else
            {
                MessageBox.Show("Er is iets fout gegaan bij het opslaan.");
            }
        }
    }
}

