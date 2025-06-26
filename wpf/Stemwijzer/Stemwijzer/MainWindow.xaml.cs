using System;
using System.Collections.Generic;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using MySql.Data.MySqlClient;

namespace Stemwijzer
{
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();

        }
        public bool partijw = false;
        public bool gebruikerw = false;
        public bool verkiezingw = false;
        public bool nieuwsw = false;
        public bool standpuntw = false;
        public bool vragenw = false;


        private void PartijenButton_Click(object sender, RoutedEventArgs e)
        {
            partijw = true;
            gebruikerw = false;
            verkiezingw = false;
            nieuwsw = false;
            standpuntw = false;
            vragenw = false;

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

            PartijenListBox.ItemsSource = partijen;
            ToonPartijen(partijen);
        }

        private void gebruikersbtn_Click(object sender, RoutedEventArgs e)
        {
            partijw = false;
            gebruikerw = true;
            verkiezingw = false;
            nieuwsw = false;
            standpuntw = false;
            vragenw = false;

            var database = new Databasehandler();
            database.OpenConnection();

            string query = "SELECT id, name, role  FROM user";
            var reader = database.ExecuteQuery(query);

            List<User> gebruiker = new List<User>();

            while (reader.Read())
            {
                User u = new User
                {
                    Id = Convert.ToInt32(reader["id"]),
                    Naam = reader["name"].ToString(),
                    Role = reader["role"].ToString(),

                };
                gebruiker.Add(u);
            }

            reader.Close();
            database.CloseConnection();

            PartijenListBox.ItemsSource = gebruiker;
            ToonGebruikers(gebruiker);
        }

        private void verkiezingbtn_Click(object sender, RoutedEventArgs e)
        {
            partijw = false;
            gebruikerw = false;
            verkiezingw = true;
            nieuwsw = false;
            standpuntw = false;
            vragenw = false;

            var database = new Databasehandler();
            database.OpenConnection();

            string query = "SELECT id, title, start_date, end_date  FROM election";
            var reader = database.ExecuteQuery(query);

            List<Verkiezingen> verkiezing = new List<Verkiezingen>();

            while (reader.Read())
            {
                Verkiezingen v = new Verkiezingen
                {
                    Id = Convert.ToInt32(reader["id"]),
                    title = reader["title"].ToString(),
                    start_date = Convert.ToDateTime(reader["start_date"]),
                    end_date = Convert.ToDateTime(reader["end_date"]),

                };
                verkiezing.Add(v);
            }

            reader.Close();
            database.CloseConnection();

            PartijenListBox.ItemsSource = verkiezing;
            ToonVerkiezingen(verkiezing);
        }

        private void nieuwsbtn_Click(object sender, RoutedEventArgs e)
        {
            partijw = false;
            gebruikerw = false;
            verkiezingw = false;
            nieuwsw = true;
            standpuntw = false;
            vragenw = false;

            var database = new Databasehandler();
            database.OpenConnection();

            string query = "SELECT id, title, content  FROM news";
            var reader = database.ExecuteQuery(query);

            List<Nieuws> nieuw = new List<Nieuws>();

            while (reader.Read())
            {
                Nieuws n = new Nieuws
                {
                    Id = Convert.ToInt32(reader["id"]),
                    Title = reader["title"].ToString(),


                };
                nieuw.Add(n);
            }

            reader.Close();
            database.CloseConnection();

            PartijenListBox.ItemsSource = nieuw;
            ToonNieuws(nieuw);
        }



        private void standpuntenbtn_Click(object sender, RoutedEventArgs e)
        {
            partijw = false;
            gebruikerw = false;
            verkiezingw = false;
            nieuwsw = false;
            standpuntw = true;
            vragenw = false;
            var database = new Databasehandler();
            database.OpenConnection();

            string query = "SELECT id, electionid, text  FROM statement";
            var reader = database.ExecuteQuery(query);

            List<Standpunten> punt = new List<Standpunten>();

            while (reader.Read())
            {
                Standpunten p = new Standpunten
                {
                    Id = Convert.ToInt32(reader["id"]),
                    text = reader["text"].ToString(),


                };
                punt.Add(p);
            }

            reader.Close();
            database.CloseConnection();

            PartijenListBox.ItemsSource = punt;
            ToonStandpunt(punt);
        }



        private void toevoegbtn_Click(object sender, RoutedEventArgs e)
        {
            if (partijw)
            {
                // Open nieuw venster
                toevoegP nieuwScherm = new toevoegP();
                nieuwScherm.Show();
            }
            else if (gebruikerw)
            {
                // Open nieuw venster
                toevoegU nieuwScherm = new toevoegU();
                nieuwScherm.Show();
            }
            else if (verkiezingw)
            {
                // Open nieuw venster
                toevoegV nieuwScherm = new toevoegV();
                nieuwScherm.Show();
            }
            else if (nieuwsw)
            {
                // Open nieuw venster
                toevoegN nieuwScherm = new toevoegN();
                nieuwScherm.Show();
            }
            else if (standpuntw)
            {
                // Open nieuw venster
                toevoegS nieuwScherm = new toevoegS();
                nieuwScherm.Show();
            }
            else if (vragenw)
            {
                // Open nieuw venster
                toevoegQ nieuwScherm = new toevoegQ();
                nieuwScherm.Show();
            }
        }

        private void verwijderenbtn_Click(object sender, RoutedEventArgs e)
        {
            if (PartijenListBox.SelectedItem == null)
            {
                MessageBox.Show("Selecteer een item om te verwijderen.");
                return;
            }

            var result = MessageBox.Show("Wil je dit item verwijderen?", "Bevestiging", MessageBoxButton.YesNo, MessageBoxImage.Warning);
            if (result != MessageBoxResult.Yes)
                return;

            Databasehandler db = new Databasehandler();

            if (PartijenListBox.SelectedItem is Partij geselecteerdePartij)
            {
                bool verwijderd = db.DeletePartij(geselecteerdePartij.Id);
                if (verwijderd)
                {
                    MessageBox.Show("Partij succesvol verwijderd.");
                    ((List<Partij>)PartijenListBox.ItemsSource).Remove(geselecteerdePartij);
                    PartijenListBox.Items.Refresh();
                }
                else
                {
                    MessageBox.Show("Verwijderen van partij is mislukt.");
                }
            }
            else if (PartijenListBox.SelectedItem is User geselecteerdeUser)
            {
                bool verwijderd = db.DeleteUser(geselecteerdeUser.Id);
                if (verwijderd)
                {
                    MessageBox.Show("Gebruiker succesvol verwijderd.");
                    ((List<User>)PartijenListBox.ItemsSource).Remove(geselecteerdeUser);
                    PartijenListBox.Items.Refresh();
                }
                else
                {
                    MessageBox.Show("Verwijderen van gebruiker is mislukt.");
                }
            }
            else if (PartijenListBox.SelectedItem is Standpunten geselecteerdestandpunt)
            {
                bool verwijderd = db.DeleteStandpunten(geselecteerdestandpunt.Id);
                if (verwijderd)
                {
                    MessageBox.Show("Gebruiker succesvol verwijderd.");
                    ((List<Standpunten>)PartijenListBox.ItemsSource).Remove(geselecteerdestandpunt);
                    PartijenListBox.Items.Refresh();
                }
                else
                {
                    MessageBox.Show("Verwijderen van gebruiker is mislukt.");
                }
            }
            else if (PartijenListBox.SelectedItem is Verkiezingen geselecteerdeVerkiezing)
            {
                bool verwijderd = db.DeleteVerkiezingen(geselecteerdeVerkiezing.Id);
                if (verwijderd)
                {
                    MessageBox.Show("Verkiezing succesvol verwijderd.");
                    ((List<Verkiezingen>)PartijenListBox.ItemsSource).Remove(geselecteerdeVerkiezing);
                    PartijenListBox.Items.Refresh();
                }
                else
                {
                    MessageBox.Show("Verwijderen van verkiezing is mislukt.");
                }
            }
            else if (PartijenListBox.SelectedItem is Nieuws geselecteerdeNieuws)
            {
                bool verwijderd = db.DeleteNieuws(geselecteerdeNieuws.Id);
                if (verwijderd)
                {
                    MessageBox.Show("Nieuwsitem succesvol verwijderd.");
                    ((List<Nieuws>)PartijenListBox.ItemsSource).Remove(geselecteerdeNieuws);
                    PartijenListBox.Items.Refresh();
                }
                else
                {
                    MessageBox.Show("Verwijderen van nieuwsitem is mislukt.");
                }
            }
            else
            {
                MessageBox.Show("Onbekend itemtype geselecteerd.");
            }
        }

        private void resetbtn_Click(object sender, RoutedEventArgs e)
        {
            partijw = false;
            gebruikerw = false;
            verkiezingw = false;
            nieuwsw = false;
            standpuntw = false;
            vragenw = false;
            var gridView = new GridView();
            PartijenListBox.View = gridView;

            PartijenListBox.ItemsSource = null;
            gridView.Columns.Clear();
        }
        private void ToonGebruikers(List<User> gebruikers)
        {
            var gridView = new GridView();

            gridView.Columns.Add(new GridViewColumn { Header = "Naam", DisplayMemberBinding = new Binding("Naam"), Width = 150 });
            gridView.Columns.Add(new GridViewColumn { Header = "Rol", DisplayMemberBinding = new Binding("Role"), Width = 100 });

            PartijenListBox.View = gridView;
            PartijenListBox.ItemsSource = gebruikers;
        }
        private void ToonPartijen(List<Partij> partijen)
        {
            var gridView = new GridView();

            
            gridView.Columns.Add(new GridViewColumn { Header = "Naam", DisplayMemberBinding = new Binding("Naam"), Width = 150 });
            gridView.Columns.Add(new GridViewColumn { Header = "Aangemaakt op", DisplayMemberBinding = new Binding("create_date"), Width = 150 });

            PartijenListBox.View = gridView;
            PartijenListBox.ItemsSource = partijen;
        }
        private void ToonVerkiezingen(List<Verkiezingen> verkiezingen)
        {
            var gridView = new GridView();

            
            gridView.Columns.Add(new GridViewColumn { Header = "Titel", DisplayMemberBinding = new Binding("title"), Width = 150 });
            gridView.Columns.Add(new GridViewColumn { Header = "Startdatum", DisplayMemberBinding = new Binding("start_date"), Width = 100 });
            gridView.Columns.Add(new GridViewColumn { Header = "Einddatum", DisplayMemberBinding = new Binding("end_date"), Width = 100 });

            PartijenListBox.View = gridView;
            PartijenListBox.ItemsSource = verkiezingen;
        }
        private void ToonNieuws(List<Nieuws> nieuws)
        {
            var gridView = new GridView();

            
            gridView.Columns.Add(new GridViewColumn { Header = "Titel", DisplayMemberBinding = new Binding("Title"), Width = 150 });
            gridView.Columns.Add(new GridViewColumn { Header = "Discription", DisplayMemberBinding = new Binding("Discription"), Width = 150 });

            PartijenListBox.View = gridView;
            PartijenListBox.ItemsSource = nieuws;
        }
        private void ToonStandpunt(List<Standpunten> punt)
        {
            var gridView = new GridView();

            gridView.Columns.Add(new GridViewColumn { Header = "Tekst", DisplayMemberBinding = new Binding("text"), Width = 400 });

            PartijenListBox.View = gridView;
            PartijenListBox.ItemsSource = punt;

        }

        private void aanpassenbtn_Click(object sender, RoutedEventArgs e)
        {
            if (gebruikerw == true)
            {
                if (PartijenListBox.SelectedItem is User geselecteerdeuser)
                {

                    aanpassenG nieuwScherm = new aanpassenG(geselecteerdeuser);
                    nieuwScherm.Show();
                }
            }
            else if (partijw == true)
            {
                if (PartijenListBox.SelectedItem is Partij geselecteerdePartij)
                {

                    aanpassenP window = new aanpassenP(geselecteerdePartij);
                    window.Show();

                }

            }
            else if (verkiezingw == true)
            {
                if (PartijenListBox.SelectedItem is Verkiezingen geselecteerdeVerkiezingen)
                {
                    aanpassenV nieuwScherm = new aanpassenV(geselecteerdeVerkiezingen);
                    nieuwScherm.Show();
                }

            }
            else if (standpuntw == true)
            {
                if (PartijenListBox.SelectedItem is Standpunten geselecteerdeStandpunt)
                {
                    aanpassenS nieuwScherm = new aanpassenS(geselecteerdeStandpunt);
                    nieuwScherm.Show();
                }
            }
            else
            {
                 if ((nieuwsw == true) && (PartijenListBox.SelectedItem is Nieuws geselecteerdeNieuws))
                {
                    aanpassenN nieuwScherm = new aanpassenN(geselecteerdeNieuws);
                    nieuwScherm.Show();
                }
            }
        }

        private void Zoekbtn_Click(object sender, RoutedEventArgs e)
        {
            PartijenListBox.ItemsSource = null; 
            string zoekterm = ZoekTextBox.Text.Trim();

            if (string.IsNullOrWhiteSpace(zoekterm))
            {
                MessageBox.Show("Voer een zoekterm in.");
                return;
            }

            List<string> resultaten = new List<string>();

            var db = new Databasehandler();
            db.OpenConnection();

            // Simpele zoekopdracht in meerdere tabellen/kolommen (pas aan zoals nodig)
            string query = @"
            SELECT name FROM party WHERE name LIKE @term
            UNION
            SELECT text FROM statement WHERE text LIKE @term
            UNION
            SELECT name FROM user WHERE name LIKE @term  
            UNION 
            SELECT title FROM news WHERE title LIKE @term";

            using (MySqlCommand cmd = new MySqlCommand(query, db.connection))
            {
                cmd.Parameters.AddWithValue("@term", "%" + zoekterm + "%");

                using (var reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        resultaten.Add(reader[0].ToString());
                    }
                }
            }

            db.CloseConnection();

            if (resultaten.Count == 0)
            {
                MessageBox.Show("Geen resultaten gevonden.");
            }

            PartijenListBox.ItemsSource = resultaten;
        }
    }
}
   // public bool partijw = false;
   // public bool gebruikerw = false;
    //public bool verkiezingw = false;
    //public bool nieuwsw = false;
    //public bool standpuntw = false;
    //public bool vragenw = false;



    
    
  


