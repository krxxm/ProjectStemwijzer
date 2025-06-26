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
    /// Interaction logic for toevoegN.xaml
    /// </summary>
    public partial class toevoegN : Window
    {
        public toevoegN()
        {
            InitializeComponent();
        }

        private void Ntoevoegen_Click(object sender, RoutedEventArgs e)
        {
            string titel = titeltxt.Text;
            string description = omschrijvingtxt.Text;
            string content = contenttxt.Text;

            if (string.IsNullOrWhiteSpace(titel) || string.IsNullOrWhiteSpace(description) || string.IsNullOrWhiteSpace(content))
            {
                MessageBox.Show("Vul alle velden in.");
                return;
            }

            Nieuws  Nieuw = new Nieuws
            {
                Title = titel,
                Discription = description,
                Content = content
            };
            Databasehandler dbHandler = new Databasehandler();
            dbHandler.OpenConnection();

            bool isCreated = dbHandler.CreateNieuws(Nieuw.Title, Nieuw.Discription, Nieuw.Content);

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
