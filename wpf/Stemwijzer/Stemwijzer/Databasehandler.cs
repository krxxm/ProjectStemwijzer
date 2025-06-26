using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Windows;
using System.Windows.Controls;
using MySql.Data.MySqlClient;

namespace Stemwijzer
{
    public class Databasehandler
    {
        private string connectionString = "Server=localhost;Database=stemwijzer;Uid=root;Password=Jaylenmartinus1;";
        public MySqlConnection connection;

        public Databasehandler()
        {
            connection = new MySqlConnection(connectionString);
        }

        public void OpenConnection()
        {
            if (connection.State != System.Data.ConnectionState.Open)
            {
                connection.Open();
            }
        }

        public void CloseConnection()
        {
            if (connection.State != System.Data.ConnectionState.Closed)
            {
                connection.Close();
            }
        }

        // Voorbeeld: data ophalen
        public MySqlDataReader ExecuteQuery(string query)
        {
            MySqlCommand command = new MySqlCommand(query, connection);
            return command.ExecuteReader();
        }
        public bool CreatePartij(string naam, DateTime createDate)
        {

            string query = "INSERT INTO party (name, create_date) VALUES (@naam, @createDate)";
            using (MySqlCommand cmd = new MySqlCommand(query, connection))
            {
                cmd.Parameters.AddWithValue("@naam", naam);
                cmd.Parameters.AddWithValue("@createDate", createDate);

                try
                {
                    int result = cmd.ExecuteNonQuery();
                    return result > 0;
                }
                catch (Exception ex)
                {
                    MessageBox.Show("SQL FOUT: " + ex.Message);
                    return false;
                }
            }
        }
        public bool CreateUser(string naam, string Email, string Role)
        {
            string query = "INSERT INTO user (name, email, role) VALUES (@naam, @email, @role)";
            using (MySqlCommand cmd = new MySqlCommand(query, connection))
            {
                cmd.Parameters.AddWithValue("@naam", naam);
                cmd.Parameters.AddWithValue("@email", Email);
                cmd.Parameters.AddWithValue("@role", Role);

                try
                {
                    int result = cmd.ExecuteNonQuery();
                    return result > 0;
                }
                catch (Exception ex)
                {
                    MessageBox.Show("SQL FOUT: " + ex.Message);
                    return false;
                }
            }
        }
        public bool CreateStandpunt(string standpunt)
        {
            string query = "INSERT INTO statement (text) VALUES (@text)";
            using (MySqlCommand cmd = new MySqlCommand(query, connection))
            {
                cmd.Parameters.AddWithValue("@text", standpunt);


                try
                {
                    int result = cmd.ExecuteNonQuery();
                    return result > 0;
                }
                catch (Exception ex)
                {
                    MessageBox.Show("SQL FOUT: " + ex.Message);
                    return false;
                }
            }
        }
            public bool CreateVerkiezingen(string titel, string discription, DateTime start_date, DateTime end_date)
            {
                string query = "INSERT INTO election (title, discription, start_date, end_date) VALUES (@title , @discription , @start_date , @end_date)";
                using (MySqlCommand cmd = new MySqlCommand(query, connection))
                {
                    cmd.Parameters.AddWithValue("@title", titel);
                    cmd.Parameters.AddWithValue("@discription", discription);
                    cmd.Parameters.AddWithValue("@start_date", start_date);
                    cmd.Parameters.AddWithValue("@end_date", end_date);


                try
                    {
                        int result = cmd.ExecuteNonQuery();
                        return result > 0;
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("SQL FOUT: " + ex.Message);
                        return false;
                    }
                }
            }
        public bool CreateNieuws(string titel, string discription, string content)
        {
            string query = "INSERT INTO news (title, description, content) VALUES (@title , @description , @content)";
            using (MySqlCommand cmd = new MySqlCommand(query, connection))
            {
                cmd.Parameters.AddWithValue("@title", titel);
                cmd.Parameters.AddWithValue("@description", discription);
                cmd.Parameters.AddWithValue("@content", content);
             


                try
                {
                    int result = cmd.ExecuteNonQuery();
                    return result > 0;
                }
                catch (Exception ex)
                {
                    MessageBox.Show("SQL FOUT: " + ex.Message);
                    return false;
                }
            }
        }
        public bool DeletePartij(int partijId)
        { 
         string query = "DELETE FROM party WHERE id = @partijId";

         try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@partijId", partijId);
                int rowsAffected = command.ExecuteNonQuery();

                return rowsAffected > 0;

            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL FOUT: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool DeleteUser(int userId)
        {
            string query = "DELETE FROM user WHERE id = @userId";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@userId", userId);
                int rowsAffected = command.ExecuteNonQuery();

                return rowsAffected > 0;

            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL FOUT: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool DeleteStandpunten(int standpuntId)
        {
            string query = "DELETE FROM statement WHERE id = @standpuntId";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@standpuntId", standpuntId);
                int rowsAffected = command.ExecuteNonQuery();

                return rowsAffected > 0;

            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL FOUT: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool DeleteVerkiezingen(int verkiezingId)
        {
            string query = "DELETE FROM election WHERE id = @verkiezingId";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@verkiezingId", verkiezingId);
                int rowsAffected = command.ExecuteNonQuery();

                return rowsAffected > 0;

            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL FOUT: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool DeleteNieuws(int nieuwsId)
        {
            string query = "DELETE FROM news WHERE id = @nieuwsId";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@nieuwsId", nieuwsId);
                int rowsAffected = command.ExecuteNonQuery();

                return rowsAffected > 0;

            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL FOUT: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool UpdateUser(User user)
        {
           
            string query = "UPDATE user SET name = @naam,  role = @role WHERE id = @id";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@naam", user.Naam);
                command.Parameters.AddWithValue("@role", user.Role);
                command.Parameters.AddWithValue("@id", user.Id);

                int rowsAffected = command.ExecuteNonQuery();
                return rowsAffected > 0;
            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL-fout bij updaten gebruiker: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool UpdatePartij(Partij partij)
        {

            string query = "UPDATE party SET name = @naam  WHERE id = @id";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@naam", partij.Naam);
              
                command.Parameters.AddWithValue("@id", partij.Id);

                int rowsAffected = command.ExecuteNonQuery();
                return rowsAffected > 0;
            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL-fout bij updaten partijen: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool UpdateVerkiezingen(Verkiezingen verkiezing)
        {
            string query = "UPDATE election SET title = @title, discription = @discription  WHERE id = @id";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@title", verkiezing.title);
                command.Parameters.AddWithValue("@discription", verkiezing.discription);
                command.Parameters.AddWithValue("@id", verkiezing.Id);

                int rowsAffected = command.ExecuteNonQuery();
                return rowsAffected > 0;
            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL-fout bij updaten verkiezingen: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool UpdateStandpunt(Standpunten standpunt)
        {
            string query = "UPDATE statement SET text = @text WHERE id = @id";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@text", standpunt.text);
                command.Parameters.AddWithValue("@id", standpunt.Id);

                int rowsAffected = command.ExecuteNonQuery();
                return rowsAffected > 0;
            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL-fout bij updaten standpunt: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public bool UpdateNieuws(Nieuws nieuw)
        {
            string query = "UPDATE news SET text = @text WHERE id = @id";

            try
            {
                OpenConnection();
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@title", nieuw.Title);
                command.Parameters.AddWithValue("@id", nieuw.Id);

                int rowsAffected = command.ExecuteNonQuery();
                return rowsAffected > 0;
            }
            catch (Exception ex)
            {
                MessageBox.Show("SQL-fout bij updaten standpunt: " + ex.Message);
                return false;
            }
            finally
            {
                CloseConnection();
            }
        }
        public static List<koppeling> LaadKoppelingen()
        {
            List<koppeling> koppelingen = new List<koppeling>();
            var db = new Databasehandler();
            db.OpenConnection();

            string query = @"
        SELECT ep.partyID, ep.electionID, s.text
        FROM election_party ep
        JOIN statement s ON s.electionID = ep.electionID";

            using (var cmd = new MySqlCommand(query, db.connection))
            using (var reader = cmd.ExecuteReader())
            {
                while (reader.Read())
                {
                    koppelingen.Add(new koppeling
                    {
                        PartyID = Convert.ToInt32(reader["partyID"]),
                        ElectionID = Convert.ToInt32(reader["electionID"]),
                        StatementText = reader["text"].ToString()
                    });
                }
            }

            db.CloseConnection();
            return koppelingen;
        }




    }

}
