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
    /// Interaction logic for toevoegP.xaml
    /// </summary>
    public partial class toevoegP : Window
    {
        public toevoegP()
        {
            InitializeComponent();
        }

        private void pvoegbtn_Click(object sender, RoutedEventArgs e)
        {
            string naam = naamtxt.Text;

            if (string.IsNullOrWhiteSpace(naam))
            {
                MessageBox.Show("Vul een naam in.");
                return;
            }

            if (!DateTime.TryParse(createdatetxt.Text, out DateTime createDate))
            {
                MessageBox.Show("Ongeldige datum. Gebruik bijv. 01-06-2025.");
                return;
            }

            Partij nieuwepartij = new Partij
            {
                Naam = naam,
                create_date = createDate
            };

            Databasehandler dbHandler = new Databasehandler();
            dbHandler.OpenConnection();

            bool isCreated = dbHandler.CreatePartij(nieuwepartij.Naam, nieuwepartij.create_date);


            if (isCreated)
            {
                MessageBox.Show("Partij succesvol toegevoegd.");
            }
            else
            {
                MessageBox.Show("Er is een fout opgetreden bij het toevoegen van de partij.");
            }

            dbHandler.CloseConnection();
            this.Close();


         
        }
        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            LaadStandpunten();
        }

        private void LaadStandpunten()
        {
            var db = new Databasehandler();
            db.OpenConnection();

            string query = "SELECT id, text, electionid FROM statement";
            var reader = db.ExecuteQuery(query);

            List<Standpunten> standpunten = new List<Standpunten>();

            while (reader.Read())
            {
                Standpunten s = new Standpunten
                {
                    Id = Convert.ToInt32(reader["id"]),
                    text = reader["text"].ToString(),
                    electionid = Convert.ToInt32(reader["electionid"])
                };
                standpunten.Add(s);
            }

            reader.Close();
            db.CloseConnection();

            standbox.ItemsSource = standpunten;
        }

    }
}