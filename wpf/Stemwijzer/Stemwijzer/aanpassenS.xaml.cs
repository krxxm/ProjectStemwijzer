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
    /// Interaction logic for aanpassenS.xaml
    /// </summary>
    public partial class aanpassenS : Window
    {
        public aanpassenS()
        {
            InitializeComponent();
        }
        private Standpunten geselecteerdeStandpunt;

        public aanpassenS(Standpunten standpunt)
        {
            InitializeComponent();
            geselecteerdeStandpunt = standpunt;

            standpunttxt.Text = geselecteerdeStandpunt.text;
        }

        private void standpunttxt_TextChanged(object sender, TextChangedEventArgs e)
        {

        }

        private void saanpassenbtn_Click(object sender, RoutedEventArgs e)
        {
            string nieuweStandpunt = standpunttxt.Text;

            geselecteerdeStandpunt.text = nieuweStandpunt;

            Databasehandler db = new Databasehandler();
            bool isAangepast = db.UpdateStandpunt(geselecteerdeStandpunt);

            if (isAangepast)
            {
                MessageBox.Show("Standpunt succesvol aangepast.");
                this.Close();
            }
            else
            {
                MessageBox.Show("Er is iets fout gegaan bij het opslaan.");
            }
        }
    }
}
