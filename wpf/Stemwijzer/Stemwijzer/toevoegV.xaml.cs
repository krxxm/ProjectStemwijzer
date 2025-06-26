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
    
    public partial class toevoegV : Window
    {
        public toevoegV()
        {
            InitializeComponent();
        }

        private void Vtoevoegbtn_Click(object sender, RoutedEventArgs e)
        {
            string titel = titeltxt.Text;
            string beschrijving = omschrijvingtxt.Text;

            if (string.IsNullOrWhiteSpace(titel) || string.IsNullOrWhiteSpace(beschrijving))
            {
                MessageBox.Show("Vul een titel en beschrijving in.");
                return;
            }

            if (begindatum.SelectedDate == null)
            {
                MessageBox.Show("Selecteer een begindatum.");
                return;
            }

            if (einddatum.SelectedDate == null)
            {
                MessageBox.Show("Selecteer een einddatum.");
                return;
            }

            DateTime start_date = begindatum.SelectedDate.Value;
            DateTime end_date = einddatum.SelectedDate.Value;

            Verkiezingen nieuweVerkiezingen = new Verkiezingen
            {
                title = titel,
                discription = beschrijving,
                start_date = start_date,
                end_date = end_date
            };


            Databasehandler dbHandler = new Databasehandler();
            dbHandler.OpenConnection();

            bool isCreated = dbHandler.CreateVerkiezingen( nieuweVerkiezingen.title, nieuweVerkiezingen.discription,  nieuweVerkiezingen.start_date, nieuweVerkiezingen.end_date );

            if (isCreated)
            {
                MessageBox.Show("Verkiezing succesvol toegevoegd.");
            }
            else
            {
                MessageBox.Show("Er is een fout opgetreden bij het toevoegen.");
            }

            dbHandler.CloseConnection();
            this.Close();
        }

        private void LaadPartijen()
        {
            var database = new Databasehandler();
            database.OpenConnection();

            string query = "SELECT id, name, create_date FROM party";
            var reader = database.ExecuteQuery(query);

            List<Partij> partijen = new List<Partij>();

            while (reader.Read())
            {
                Partij p = new Partij
                {
                    Id = Convert.ToInt32(reader["id"]),
                    Naam = reader["name"].ToString(),
                    create_date = Convert.ToDateTime(reader["create_date"]),
                };
                partijen.Add(p);
            }

            reader.Close();
            database.CloseConnection();

            // ItemsSource toewijzen
            Vpartijbox.ItemsSource = partijen;


        }
        private void LaadStandpunten()
        {
            var database = new Databasehandler();
            database.OpenConnection();

            string query = "SELECT id, electionID, text FROM statement";
            var reader = database.ExecuteQuery(query);

            List<Standpunten> standpunt = new List<Standpunten>();

            while (reader.Read())
            {
                Standpunten s = new Standpunten
                {
                    Id = Convert.ToInt32(reader["id"]),
                    electionid = reader["electionID"] != DBNull.Value ? Convert.ToInt32(reader["electionID"]) : 0,
                    text = reader["text"].ToString(),
                };
                standpunt.Add(s);
            }

            reader.Close();
            database.CloseConnection();

            // ItemsSource toewijzen
            Standpuntbox.ItemsSource = standpunt;


        }
        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            LaadPartijen();
            LaadStandpunten();

            Databasehandler dbHandler = new Databasehandler();
            var koppelingen = Databasehandler.LaadKoppelingen(); 


           

            foreach (var koppeling in koppelingen)
            {
                Console.WriteLine($"PartyID: {koppeling.PartyID}, ElectionID: {koppeling.ElectionID}, Statement: {koppeling.StatementText}");
            }
        }
    }
}
